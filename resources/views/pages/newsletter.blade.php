@extends('layouts.app', ['title' => 'Newsletter — Build With Abdallah'])

@section('content')
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <nav class="reveal flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">Newsletter</span>
        </nav>

        <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
            <div>
                <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500 reveal">// newsletter</div>
                <h1 class="reveal mt-5 font-display text-5xl lg:text-7xl text-ink" data-delay="1">Practical software and automation notes.</h1>
                <p class="reveal mt-7 text-lg leading-8 text-dim max-w-[620px]" data-delay="2">
                    A focused newsletter for founders, builders, and business owners who want useful implementation ideas, not fluff.
                </p>
                <ul class="reveal mt-8 space-y-4 text-base text-ink2" data-delay="3">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono">→</span> Laravel and backend implementation notes</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono">→</span> Automation ideas you can actually apply</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono">→</span> API and AI-agent patterns for real projects</li>
                </ul>
            </div>

            <div class="reveal rounded-lg border border-line bg-surface/80 p-7 lg:p-9 shadow-card" data-delay="2">
                @if(session('newsletter_success'))
                    <div class="mb-5 rounded-sm border border-live/40 bg-live/10 px-4 py-3 text-base text-live">{{ session('newsletter_success') }}</div>
                @endif
                <form action="{{ route('newsletter.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="source" value="newsletter-page">
                    <div>
                        <label class="block text-sm font-medium text-ink2 mb-2" for="newsletter-name">Name (optional)</label>
                        <input id="newsletter-name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-sm border border-line bg-bg text-ink placeholder-faint focus:border-brand-500 focus:outline-none transition" placeholder="Abdallah">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-ink2 mb-2" for="newsletter-email">Email</label>
                        <input id="newsletter-email" type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-sm border border-line bg-bg text-ink placeholder-faint focus:border-brand-500 focus:outline-none transition" placeholder="you@example.com" required>
                        @error('email') <p class="mt-2 text-sm text-crit">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="inline-flex w-full items-center justify-center gap-3 rounded-sm bg-brand-500 px-6 py-3.5 text-base font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400 sm:w-auto">
                        Join the newsletter
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
