<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Mail\ContactSubmission;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact', [
            'requestedProjectType' => request()->string('project_type')->toString(),
        ]);
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        $contact = ContactMessage::query()->create($request->validated());

        // Notify the site owner. Best-effort: a mail hiccup must not lose the
        // message (it's already persisted) or break the user's submission.
        try {
            Mail::to(config('mail.from.address'))->send(new ContactSubmission($contact));
        } catch (\Throwable $e) {
            Log::warning('Contact notification email failed', [
                'id' => $contact->id,
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with('success', 'Thanks — your message was sent.');
    }
}
