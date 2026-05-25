@extends('layouts.app', ['title' => 'About — Build With Abdallah'])

@section('content')
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <nav class="reveal flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">About</span>
        </nav>

        <div class="grid gap-12 lg:grid-cols-[1fr_440px] lg:items-end">
            <div>
                <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500 reveal">// about</div>
                <h1 class="reveal mt-5 font-display text-5xl lg:text-7xl text-ink max-w-[900px]" data-delay="1">
                    Practical software, AI agents, and automation for teams that need work shipped.
                </h1>
                <p class="reveal mt-7 text-lg leading-8 text-dim max-w-[720px]" data-delay="2">
                    Build With Abdallah is the service brand of Abdallah Mohamed: a full-stack developer at Kyocera AVX and Computer Science student at the University of Southern Maine.
                </p>
            </div>

            <div class="reveal rounded-lg border border-line bg-surface/70 p-5 shadow-card" data-delay="2">
                <img src="{{ asset('brand/banner.png') }}" alt="Build With Abdallah brand banner" class="w-full rounded-sm border border-line object-cover">
            </div>
        </div>
    </div>
</section>

<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <div class="grid gap-10 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="reveal">
                <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">// how I work</div>
                <h2 class="mt-4 font-display text-4xl lg:text-5xl text-ink">Clear scope. Useful systems. No hype.</h2>
            </div>
            <div class="reveal space-y-6 text-lg leading-8 text-dim" data-delay="1">
                <p>I work on Laravel systems, APIs, dashboards, AI agents, Telegram bots, payment workflows, and business automation.</p>
                <p>The goal is simple: build tools that save time, reduce mistakes, and help a business respond faster.</p>
                <p>I use the same workflow on my own systems before offering it to clients: agents, GitHub automation, dashboards, API integrations, and self-hosted deployment on real hardware.</p>
            </div>
        </div>

        <div class="mt-14 grid gap-px overflow-hidden rounded-md border border-line/70 bg-line/60 md:grid-cols-3">
            <article class="bg-surface p-8">
                <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">01</div>
                <h3 class="mt-5 font-display text-3xl text-ink">Ship useful MVPs</h3>
                <p class="mt-4 text-base leading-7 text-dim">Start with the right scope, database, admin workflow, and clean public interface.</p>
            </article>
            <article class="bg-surface p-8">
                <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">02</div>
                <h3 class="mt-5 font-display text-3xl text-ink">Automate real work</h3>
                <p class="mt-4 text-base leading-7 text-dim">Use APIs, agents, and alerts to reduce manual steps and missed follow-ups.</p>
            </article>
            <article class="bg-surface p-8">
                <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">03</div>
                <h3 class="mt-5 font-display text-3xl text-ink">Explain the work</h3>
                <p class="mt-4 text-base leading-7 text-dim">Publish useful tutorials and build notes that show how systems are actually made.</p>
            </article>
        </div>
    </div>
</section>
@endsection
