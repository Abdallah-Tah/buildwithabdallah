@extends('layouts.app', [
    'title' => 'Build With Abdallah',
    'metaDescription' => 'Full-stack software, AI agents, dashboards, APIs, automation, and MVP builds by Abdallah Mohamed.',
])

@section('content')
<section class="mx-auto max-w-7xl px-4 pb-12 pt-10 sm:px-6 sm:pb-16 sm:pt-14 lg:px-8 lg:pb-24 lg:pt-16">
    <div class="grid items-center gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:gap-12">
        <div>
            <div class="inline-flex items-center gap-2 rounded-lg border border-blue-100 bg-blue-50 px-4 py-2 text-sm font-medium text-brand-blue">
                Full-stack developer for practical business systems
            </div>
            <div class="mt-6 flex items-center gap-3 sm:mt-7 sm:gap-4">
                <img src="{{ asset('brand/logo.jpg') }}" alt="Build With Abdallah logo" class="h-12 w-12 rounded-lg object-contain shadow-sm ring-1 ring-brand-gray sm:h-14 sm:w-14">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-slate-500 sm:text-sm">Build With Abdallah</p>
                    <p class="text-sm text-slate-600 sm:text-base">AI agents • dashboards • APIs • automation</p>
                </div>
            </div>
            <h1 class="mt-6 max-w-3xl text-4xl font-semibold tracking-tight text-brand-navy sm:mt-7 sm:text-5xl lg:text-6xl">
                I build websites, dashboards, AI agents, and automation systems for real business work.
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                I help small businesses and founders replace manual work with clean full-stack software: Laravel apps, APIs, Telegram bots, Stripe workflows, reports, and internal tools.
            </p>
            <div class="mt-7 flex flex-col gap-3 sm:mt-8 sm:flex-row sm:gap-4">
                <a href="{{ route('contact.index') }}" class="primary-button">Start a Project</a>
                <a href="{{ route('services') }}" class="secondary-button">View Services</a>
            </div>
            <div class="mt-8 grid gap-3 text-sm text-slate-600 sm:grid-cols-2">
                @foreach($proofPoints as $point)
                    <div class="border-l-2 border-blue-200 pl-3">{{ $point }}</div>
                @endforeach
            </div>
        </div>
        <div class="relative lg:pl-4">
            <div class="mx-auto max-w-[34rem] overflow-hidden border border-blue-100 bg-white p-3 shadow-sm sm:p-4">
                <img src="{{ asset('brand/banner.jpg') }}" alt="Build With Abdallah banner" class="aspect-[1280/426] w-full border border-blue-100 object-cover object-center shadow-sm">
                <div class="grid gap-3 p-4 text-sm text-slate-600 sm:grid-cols-2">
                    <div><strong class="text-brand-navy">Web apps</strong><br>Laravel, APIs, admin panels</div>
                    <div><strong class="text-brand-navy">AI workflows</strong><br>Agents, bots, approvals, alerts</div>
                    <div><strong class="text-brand-navy">Business ops</strong><br>Dashboards, reports, payments</div>
                    <div><strong class="text-brand-navy">Delivery</strong><br>Build, deploy, document, improve</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Services</p>
            <h2 class="section-title">Focused software and automation services</h2>
        </div>
    </div>
    <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach($services as $service)
            <article class="card-surface">
                <div class="mb-5 text-sm font-semibold uppercase tracking-[0.2em] text-brand-blue">Service</div>
                <h3 class="text-xl font-semibold text-brand-navy">{{ $service['title'] }}</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['description'] }}</p>
            </article>
        @endforeach
    </div>
</section>

<section class="page-section">
    <div class="grid gap-8 lg:grid-cols-[1fr_1fr]">
        <div>
            <p class="section-eyebrow">Latest tutorials</p>
            <h2 class="section-title">Practical content that proves the work</h2>
            @if($featuredTutorial)
                <article class="card-surface mt-8 border-blue-200 bg-gradient-to-br from-white to-blue-50">
                    <div class="inline-flex rounded-lg bg-brand-blue px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white">Featured tutorial</div>
                    <h3 class="mt-5 text-2xl font-semibold text-brand-navy">{{ $featuredTutorial->title }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $featuredTutorial->excerpt }}</p>
                    <a href="{{ route('tutorials.show', $featuredTutorial->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-brand-blue">Read featured tutorial →</a>
                </article>
            @else
                <div class="empty-state mt-8">
                    <h3 class="text-xl font-semibold text-brand-navy">Tutorials are coming soon</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">This section will feature practical Laravel, automation, and API tutorials once the first real articles are published.</p>
                </div>
            @endif
        </div>
        <div class="grid gap-4 self-end">
            @forelse($latestTutorials as $post)
                <article class="card-surface">
                    <div class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $post->category?->name ?? 'Tutorial' }}</div>
                    <h3 class="mt-3 text-xl font-semibold text-brand-navy">{{ $post->title }}</h3>
                    <p class="mt-2 text-sm leading-7 text-slate-600">{{ $post->excerpt }}</p>
                    <a href="{{ route('tutorials.show', $post->slug) }}" class="mt-4 inline-flex text-sm font-semibold text-brand-blue">Read tutorial →</a>
                </article>
            @empty
                <div class="empty-state">
                    <h3 class="text-xl font-semibold text-brand-navy">No published tutorials yet</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">Once articles are live, this area will show the latest technical tutorials and implementation notes.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="page-section">
    <div class="flex items-end justify-between gap-6">
        <div>
            <p class="section-eyebrow">Latest videos</p>
            <h2 class="section-title">Video explainers and demos</h2>
        </div>
    </div>
    <div class="mt-8 grid gap-6 lg:grid-cols-3">
        @forelse($latestVideos as $video)
            <article class="card-surface flex flex-col overflow-hidden">
                <div class="aspect-video overflow-hidden rounded-lg border border-blue-100 bg-slate-100">
                    <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                </div>
                <h3 class="mt-5 text-xl font-semibold text-brand-navy">{{ $video->title }}</h3>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($video->description, 120) }}</p>
                <a href="{{ route('videos.show', $video->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-brand-blue">Watch details →</a>
            </article>
        @empty
            <div class="empty-state lg:col-span-3">
                <h3 class="text-xl font-semibold text-brand-navy">No published videos yet</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Video explainers and walkthroughs will appear here once they are published.</p>
            </div>
        @endforelse
    </div>
</section>

<section class="page-section" id="newsletter-signup">
    <div class="grid gap-10 border border-blue-200 bg-blue-50 p-6 lg:grid-cols-[0.95fr_1.05fr]">
        <div>
            <p class="section-eyebrow">Newsletter</p>
            <h2 class="section-title">Get practical software and automation notes.</h2>
            <p class="mt-4 text-base leading-8 text-slate-600">
                Short notes on AI agents, Laravel, APIs, dashboards, and business automation. No hype, no fake case studies.
            </p>
            <ul class="mt-6 space-y-3 text-sm text-slate-600">
                <li>• Quick engineering takeaways</li>
                <li>• Automation ideas you can actually use</li>
                <li>• API patterns and implementation notes</li>
            </ul>
        </div>
        <div class="border border-blue-100 bg-white p-5 shadow-sm sm:p-6">
            @if(session('newsletter_success'))
                <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('newsletter_success') }}</div>
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
                    <button type="submit" class="primary-button w-full sm:w-auto">Join the Newsletter</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 pb-24 pt-4 sm:px-6 lg:px-8">
    <div class="bg-brand-navy px-6 py-10 text-white sm:px-10 lg:flex lg:items-center lg:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-blue-200">Contact</p>
            <h2 class="mt-2 text-3xl font-semibold">Need a clean MVP, dashboard, API, or automation system?</h2>
        </div>
        <a href="{{ route('contact.index') }}" class="mt-6 inline-flex items-center justify-center rounded-lg bg-white px-6 py-3 font-semibold text-brand-navy transition hover:bg-slate-100 lg:mt-0">Contact Me</a>
    </div>
</section>
@endsection
