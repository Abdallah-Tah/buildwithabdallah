@extends('layouts.app', ['title' => 'Unsubscribed — Build With Abdallah'])

@section('content')
<section class="relative overflow-hidden">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-28 text-center">
        <div class="max-w-xl mx-auto">
            @if($found)
                <h1 class="font-display text-4xl lg:text-5xl text-ink leading-tight">You're unsubscribed</h1>
                <p class="mt-6 text-lg text-dim leading-relaxed">
                    You won't receive any more emails from Build With Abdallah. No hard feelings — you can resubscribe anytime.
                </p>
            @else
                <h1 class="font-display text-4xl lg:text-5xl text-ink leading-tight">Link not recognized</h1>
                <p class="mt-6 text-lg text-dim leading-relaxed">
                    This unsubscribe link is invalid or has already been used. If you keep receiving emails, just reply and I'll remove you.
                </p>
            @endif

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mt-10 bg-brand-500 hover:bg-brand-400 text-brand-ink font-semibold text-base px-5 py-3 rounded-sm shadow-glow transition">
                Back to site
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 7h11M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection
