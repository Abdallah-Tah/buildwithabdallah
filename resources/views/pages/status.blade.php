@extends('layouts.app', ['title' => 'Status — Build With Abdallah'])

@section('content')
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <nav class="reveal flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">Status</span>
        </nav>

        <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500 reveal">// platform status</div>
        <h1 class="reveal mt-5 font-display text-5xl lg:text-7xl text-ink max-w-[900px]" data-delay="1">Public site and API are ready for client traffic.</h1>
        <p class="reveal mt-7 text-lg leading-8 text-dim max-w-[680px]" data-delay="2">
            This page keeps the public launch surface honest: website, content hub, contact intake, newsletter, and API health.
        </p>
    </div>
</section>

<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <div class="grid gap-px overflow-hidden rounded-md border border-line/70 bg-line/60 lg:grid-cols-3">
            <article class="bg-surface p-8">
                <div class="flex items-center gap-2 text-xs font-mono uppercase tracking-[0.18em] text-live"><span class="h-2 w-2 rounded-full bg-live"></span> Operational</div>
                <h2 class="mt-5 font-display text-3xl text-ink">Marketing site</h2>
                <p class="mt-4 text-base leading-7 text-dim">Home, services, about, videos, tutorials, newsletter, and contact pages are available.</p>
            </article>
            <article class="bg-surface p-8">
                <div class="flex items-center gap-2 text-xs font-mono uppercase tracking-[0.18em] text-live"><span class="h-2 w-2 rounded-full bg-live"></span> Operational</div>
                <h2 class="mt-5 font-display text-3xl text-ink">Lead intake</h2>
                <p class="mt-4 text-base leading-7 text-dim">Contact messages and newsletter signups are stored for admin follow-up.</p>
            </article>
            <article class="bg-surface p-8">
                <div class="flex items-center gap-2 text-xs font-mono uppercase tracking-[0.18em] text-live"><span class="h-2 w-2 rounded-full bg-live"></span> Operational</div>
                <h2 class="mt-5 font-display text-3xl text-ink">API v1</h2>
                <p class="mt-4 text-base leading-7 text-dim">Public read endpoints and protected publishing endpoints are registered.</p>
                <a href="{{ route('api.health-check') }}" class="mt-5 inline-flex text-base font-medium text-brand-400 hover:text-brand-300">Health check →</a>
            </article>
        </div>
    </div>
</section>
@endsection
