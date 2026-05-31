<?php

namespace App\Observers;

use App\Jobs\BroadcastPostToSubscribers;
use App\Models\Post;

class PostObserver
{
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
