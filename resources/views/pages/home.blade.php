@extends('layouts.app', [
    'title' => 'Build With Abdallah',
    'metaDescription' => 'Software, Automation, APIs, and Practical Tutorials by Build With Abdallah.',
])

@section('content')
<section class="mx-auto max-w-7xl px-4 pb-16 pt-16 sm:px-6 lg:px-8 lg:pb-24 lg:pt-24">
    <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
        <div>
            <div class="inline-flex rounded-full border border-cyan-400/20 bg-cyan-400/10 px-4 py-1 text-sm font-medium text-cyan-200">Professional software and automation</div>
            <h1 class="mt-6 max-w-3xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Build With Abdallah
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                Software, Automation, APIs, and Practical Tutorials. Clean systems for real business problems — built to ship, scale, and stay maintainable.
            </p>
            <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                <a href="{{ route('tutorials.index') }}" class="inline-flex items-center justify-center rounded-full bg-cyan-400 px-6 py-3 font-semibold text-slate-950 transition hover:bg-cyan-300">View Tutorials</a>
                <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/15 px-6 py-3 font-semibold text-white transition hover:border-cyan-300/50 hover:text-cyan-200">Contact Me</a>
            </div>
        </div>
        <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/30">
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl border border-white/10 bg-slate-900/90 p-5">
                    <p class="text-sm text-slate-400">Focus</p>
                    <p class="mt-2 text-xl font-semibold text-white">Modern Laravel MVPs</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-slate-900/90 p-5">
                    <p class="text-sm text-slate-400">Delivery</p>
                    <p class="mt-2 text-xl font-semibold text-white">Fast, practical, maintainable</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-slate-900/90 p-5 sm:col-span-2">
                    <p class="text-sm text-slate-400">Best fit</p>
                    <p class="mt-2 text-xl font-semibold text-white">Dashboards, automations, APIs, internal tools, tutorials, and business workflows.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Services</p>
            <h2 class="section-title">Professional solutions with a clean delivery mindset</h2>
        </div>
        <a href="{{ route('services') }}" class="hidden text-sm font-medium text-cyan-300 lg:inline">See all services →</a>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-panel">
                <h3 class="text-xl font-semibold text-white">{{ $service['title'] }}</h3>
                <p class="mt-3 text-sm leading-7 text-slate-400">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Featured tutorials</p>
            <h2 class="section-title">Practical write-ups that teach while they build trust</h2>
        </div>
        <a href="{{ route('tutorials.index') }}" class="hidden text-sm font-medium text-cyan-300 lg:inline">Browse tutorials →</a>
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        @forelse($featuredPosts as $post)
            <article class="card-panel flex flex-col">
                <div class="flex items-center gap-3 text-xs uppercase tracking-[0.2em] text-cyan-200">
                    <span>{{ $post->category?->name ?? 'Tutorial' }}</span>
                    @if($post->featured)<span class="rounded-full bg-cyan-400/10 px-2 py-1 tracking-normal">Featured</span>@endif
                </div>
                <h3 class="mt-4 text-xl font-semibold text-white">{{ $post->title }}</h3>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-400">{{ $post->excerpt }}</p>
                <a href="{{ route('tutorials.show', $post->slug) }}" class="mt-6 inline-flex text-sm font-medium text-cyan-300">Read tutorial →</a>
            </article>
        @empty
            <div class="card-panel lg:col-span-3">No tutorials yet.</div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Latest videos</p>
            <h2 class="section-title">Short practical content for builders and business owners</h2>
        </div>
        <a href="{{ route('videos.index') }}" class="hidden text-sm font-medium text-cyan-300 lg:inline">Browse videos →</a>
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        @forelse($latestVideos as $video)
            <article class="card-panel flex flex-col">
                <div class="aspect-video overflow-hidden rounded-2xl border border-white/10 bg-slate-900">
                    <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                </div>
                <h3 class="mt-5 text-xl font-semibold text-white">{{ $video->title }}</h3>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-400">{{ \Illuminate\Support\Str::limit($video->description, 120) }}</p>
                <a href="{{ route('videos.show', $video->slug) }}" class="mt-6 inline-flex text-sm font-medium text-cyan-300">Watch details →</a>
            </article>
        @empty
            <div class="card-panel lg:col-span-3">No videos yet.</div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="card-panel overflow-hidden lg:grid lg:grid-cols-[1fr_0.9fr] lg:gap-12">
        <div>
            <p class="section-eyebrow">About</p>
            <h2 class="section-title">Build systems that help people work better</h2>
            <p class="mt-6 text-base leading-8 text-slate-300">
                Build With Abdallah focuses on software that solves operational problems without turning into a maintenance headache. The goal is simple: ship something useful, keep it clean, and leave room for growth.
            </p>
            <a href="{{ route('about') }}" class="mt-6 inline-flex text-sm font-medium text-cyan-300">More about the work →</a>
        </div>
        <div class="mt-10 rounded-3xl border border-white/10 bg-slate-900/80 p-6 lg:mt-0">
            <ul class="space-y-4 text-sm text-slate-300">
                <li>• Laravel, PHP, Livewire, Filament</li>
                <li>• APIs and automation-first architecture</li>
                <li>• Mobile-friendly, admin-friendly, SEO-aware builds</li>
                <li>• MVP-first execution without the usual bloat</li>
            </ul>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 pb-24 pt-6 sm:px-6 lg:px-8">
    <div class="rounded-[2rem] border border-cyan-400/20 bg-cyan-400/10 px-6 py-10 sm:px-10 lg:flex lg:items-center lg:justify-between">
        <div>
            <p class="section-eyebrow text-cyan-100">Ready to build?</p>
            <h2 class="mt-2 text-3xl font-semibold text-white">Need a clean MVP, dashboard, API, or automation system?</h2>
        </div>
        <a href="{{ route('contact.index') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-white px-6 py-3 font-semibold text-slate-950 transition hover:bg-slate-100 lg:mt-0">Start the conversation</a>
    </div>
</section>
@endsection
