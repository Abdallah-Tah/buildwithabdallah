<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsletterSubscriberRequest;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsletterController extends Controller
{
    public function index(): View
    {
        return view('pages.newsletter');
    }

    public function store(StoreNewsletterSubscriberRequest $request): RedirectResponse
    {
        NewsletterSubscriber::query()->updateOrCreate(
            ['email' => $request->validated('email')],
            [
                'name' => $request->validated('name'),
                'source' => $request->validated('source', 'website'),
                'subscribed_at' => now(),
            ],
        );

        return back()->with('newsletter_success', 'You are in. Expect practical software, automation, and API tips.');
    }
}
