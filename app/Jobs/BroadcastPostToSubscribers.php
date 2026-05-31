<?php

namespace App\Jobs;

use App\Mail\NewPostPublished;
use App\Models\NewsletterSubscriber;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BroadcastPostToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Post $post) {}

    public function handle(): void
    {
        // Only broadcast published posts; bail if it was unpublished meanwhile.
        if ($this->post->status !== 'published') {
            return;
        }

        NewsletterSubscriber::query()
            ->active()
            ->whereNotNull('email')
            ->chunkById(200, function ($subscribers): void {
                foreach ($subscribers as $subscriber) {
                    Mail::to($subscriber->email)
                        ->send(new NewPostPublished($this->post, $subscriber));
                }
            });
    }
}
