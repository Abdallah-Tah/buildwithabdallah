@extends('layouts.app', [
    'title' => 'Build With Abdallah',
    'metaDescription' => 'Software, Automation, APIs, Solutions, tutorials, and videos by Build With Abdallah.',
])

@section('content')
<section class="mx-auto max-w-7xl px-4 pb-18 pt-14 sm:px-6 lg:px-8 lg:pb-24 lg:pt-18">
    <div class="grid items-center gap-12 lg:grid-cols-[1.05fr_0.95fr]">
        <div>
            <div class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-blue-50 px-4 py-2 text-sm font-medium text-brand-blue">
                <span class="h-2 w-2 rounded-full bg-brand-blue"></span>
                Professional software and automation
            </div>
            <div class="mt-8 flex items-center gap-4">
                <img src="{{ asset('brand/logo.png') }}" alt="Build With Abdallah logo" class="h-16 w-16 rounded-2xl object-contain shadow-sm ring-1 ring-brand-gray">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-slate-500">Build With Abdallah</p>
                    <p class="text-base text-slate-600">Software • Automation • APIs • Solutions</p>
                </div>
            </div>
            <h1 class="mt-8 max-w-3xl text-4xl font-semibold tracking-tight text-brand-navy sm:text-5xl lg:text-6xl">
                Build modern business software that looks professional and works in the real world.
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                Clean Laravel systems, automation flows, APIs, tutorials, and business solutions designed to ship fast without turning into a maintenance mess.
            </p>
            <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                <a href="{{ route('tutorials.index') }}" class="primary-button">View Tutorials</a>
                <a href="{{ route('contact.index') }}" class="secondary-button">Contact Me</a>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -left-8 top-8 h-32 w-32 rounded-full bg-blue-100 blur-2xl"></div>
            <div class="card-surface overflow-hidden p-4 sm:p-5">
                <img src="{{ asset('brand/banner.png') }}" alt="Build With Abdallah banner" class="w-full rounded-[1.75rem] border border-blue-100 object-cover shadow-sm">
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Services</p>
            <h2 class="section-title">Focused software and automation services</h2>
        </div>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-surface">
                <div class="mb-5 h-10 w-10 rounded-2xl bg-blue-50"></div>
                <h3 class="text-xl font-semibold text-brand-navy">{{ $service['title'] }}</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1fr_1fr]">
        <div>
            <p class="section-eyebrow">Latest tutorials</p>
            <h2 class="section-title">Practical content that teaches through real implementation</h2>
            @if($featuredTutorial)
                <article class="card-surface mt-8 border-blue-200 bg-gradient-to-br from-white to-blue-50">
                    <div class="inline-flex rounded-full bg-brand-blue px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white">Featured tutorial</div>
                    <h3 class="mt-5 text-2xl font-semibold text-brand-navy">{{ $featuredTutorial->title }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $featuredTutorial->excerpt }}</p>
                    <a href="{{ route('tutorials.show', $featuredTutorial->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-brand-blue">Read featured tutorial →</a>
                </article>
            @endif
        </div>
        <div class="grid gap-4 self-end">
            @foreach($latestTutorials as $post)
                <article class="card-surface">
                    <div class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $post->category?->name ?? 'Tutorial' }}</div>
                    <h3 class="mt-3 text-xl font-semibold text-brand-navy">{{ $post->title }}</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600">{{ $post->excerpt }}</p>
                    <a href="{{ route('tutorials.show', $post->slug) }}" class="mt-4 inline-flex text-sm font-semibold text-brand-blue">Read tutorial →</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Latest videos</p>
            <h2 class="section-title">Short technical content with a clean professional presentation</h2>
        </div>
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        @forelse($latestVideos as $video)
            <article class="card-surface flex flex-col overflow-hidden">
                <div class="aspect-video overflow-hidden rounded-2xl border border-blue-100 bg-slate-100">
                    <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                </div>
                <h3 class="mt-5 text-xl font-semibold text-brand-navy">{{ $video->title }}</h3>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($video->description, 120) }}</p>
                <a href="{{ route('videos.show', $video->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-brand-blue">Watch details →</a>
            </article>
        @empty
            <div class="card-surface lg:col-span-3">No videos yet.</div>
        @endforelse
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8" id="newsletter-signup">
    <div class="card-surface grid gap-10 lg:grid-cols-[0.95fr_1.05fr]">
        <div>
            <p class="section-eyebrow">Newsletter</p>
            <h2 class="section-title">Get daily software, automation, and API tips.</h2>
            <p class="mt-4 text-base leading-8 text-slate-600">
                Short practical insights for builders, businesses, and anyone shipping modern software systems.
            </p>
        </div>
        <div>
            @if(session('newsletter_success'))
                <div class="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('newsletter_success') }}</div>
            @endif
            <form action="{{ route('newsletter.store') }}" method="POST" class="grid gap-4 sm:grid-cols-2">
                @csrf
                <input type="hidden" name="source" value="home">
                <div>
                    <label class="label-text" for="newsletter-name-home">Name (optional)</label>
                    <input id="newsletter-name-home" name="name" value="{{ old('name') }}" class="input-field-light" placeholder="Abdallah">
                </div>
                <div>
                    <label class="label-text" for="newsletter-email-home">Email</label>
                    <input id="newsletter-email-home" type="email" name="email" value="{{ old('email') }}" class="input-field-light" placeholder="you@example.com" required>
                    @error('email') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="primary-button">Join the Newsletter</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 pb-24 pt-4 sm:px-6 lg:px-8">
    <div class="rounded-[2rem] bg-brand-navy px-6 py-10 text-white sm:px-10 lg:flex lg:items-center lg:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-blue-200">Contact</p>
            <h2 class="mt-2 text-3xl font-semibold">Need a clean MVP, dashboard, API, or automation system?</h2>
        </div>
        <a href="{{ route('contact.index') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-white px-6 py-3 font-semibold text-brand-navy transition hover:bg-slate-100 lg:mt-0">Contact Me</a>
    </div>
</section>
@endsection
