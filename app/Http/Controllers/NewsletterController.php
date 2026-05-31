<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Mail\NewsletterWelcome;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function index(): View
    {
        return view('pages.newsletter');
    }

    public function store(StoreNewsletterSubscriberRequest $request): RedirectResponse
    {
        $subscriber = NewsletterSubscriber::query()->updateOrCreate(
            ['email' => $request->validated('email')],
            [
                'name' => $request->validated('name'),
                'source' => $request->validated('source', 'website'),
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ],
        );

        // Welcome email is best-effort: never let a mail hiccup break signup.
        try {
            Mail::to($subscriber->email)->send(new NewsletterWelcome($subscriber));
        } catch (\Throwable $e) {
            Log::warning('Newsletter welcome email failed', ['email' => $subscriber->email, 'error' => $e->getMessage()]);
        }

        return back()->with('newsletter_success', 'You are in. Check your inbox for a welcome email.');
    }

    public function unsubscribe(string $token): View
    {
        $subscriber = NewsletterSubscriber::query()->where('unsubscribe_token', $token)->first();

        if ($subscriber && $subscriber->unsubscribed_at === null) {
            $subscriber->update(['unsubscribed_at' => now()]);
        }

        return view('pages.newsletter-unsubscribed', [
            'found' => (bool) $subscriber,
        ]);
    }
}
