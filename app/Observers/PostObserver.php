<?php

namespace App\Observers;

use App\Jobs\BroadcastPostToSubscribers;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PostObserver
{
    public function saving(Post $post): void
    {
        $contentChanged = $post->isDirty(['title', 'body']);
        $post->content_hash = $this->contentHash((string) $post->title, (string) $post->body);
        $body = (string) $post->body;
        $rendered = str_contains($body, '<pre') || str_contains($body, '<h2') || str_contains($body, '<h3')
            ? $body
            : Str::markdown($body, ['html_input' => 'strip', 'allow_unsafe_links' => false]);
        $withoutCode = preg_replace('/<(pre|code)\b[^>]*>.*?<\/\1>/is', ' ', $rendered) ?? $rendered;
        $words = str_word_count(strip_tags($withoutCode));
        $post->reading_time_minutes = max(1, (int) ceil($words / 220));

        if ($post->exists && $contentChanged) {
            $post->editorial_approved_hash = null;
            $post->editorial_approved_at = null;
            $post->editorial_approval_record_hash = null;
        }

        if ($post->exists && $post->isDirty('status') && $post->status === 'published' && ! $this->hasCurrentApproval($post)) {
            throw ValidationException::withMessages([
                'status' => 'Approve the current revision before publishing it.',
            ]);
        }
    }

    private function hasCurrentApproval(Post $post): bool
    {
        return $post->editorial_approved_at !== null
            && hash_equals((string) $post->content_hash, (string) $post->editorial_approved_hash);
    }

    public function contentHash(string $title, string $body): string
    {
        $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR;

        return hash('sha256', '['.json_encode($title, $flags).', '.json_encode($body, $flags).']');
    }

    /**
     * When a post becomes published for the first time, email the newsletter
     * list exactly once. newsletter_sent_at guards against re-sends on any
     * later edit, unpublish/republish, or re-save.
     */
    public function saved(Post $post): void
    {
        if ($post->status !== 'published' || $post->newsletter_sent_at !== null) {
            return;
        }

        // Stamp first (quietly, to avoid re-triggering this observer) so the
        // broadcast can never fire twice even if the job is retried.
        $post->newsletter_sent_at = now();
        $post->saveQuietly();

        BroadcastPostToSubscribers::dispatch($post);
    }
}
