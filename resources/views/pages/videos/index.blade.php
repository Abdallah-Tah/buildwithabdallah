@extends('layouts.app', ['title' => 'Videos — Build With Abdallah'])

@section('content')
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <nav class="reveal flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">Videos</span>
        </nav>

        <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500 reveal">// videos</div>
        <h1 class="reveal mt-5 font-display text-5xl lg:text-7xl text-ink max-w-[900px]" data-delay="1">Video explainers and demos.</h1>
        <p class="reveal mt-7 text-lg leading-8 text-dim max-w-[680px]" data-delay="2">
            Short walkthroughs will appear here when real videos are published. No placeholder videos are shown on the public site.
        </p>
    </div>
</section>

<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-24">
        <div class="grid gap-px overflow-hidden rounded-md border border-line/70 bg-line/60 lg:grid-cols-3">
            @forelse($videos as $video)
                <article class="bg-surface p-6 flex flex-col">
                    <div class="aspect-video overflow-hidden rounded-sm border border-line bg-bg">
                        <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                    </div>
                    <h2 class="mt-6 font-display text-3xl text-ink">{{ $video->title }}</h2>
                    <p class="mt-3 flex-1 text-base leading-7 text-dim">{{ \Illuminate\Support\Str::limit($video->description, 120) }}</p>
                    <a href="{{ route('videos.show', $video->slug) }}" class="mt-6 inline-flex text-base font-medium text-brand-400 hover:text-brand-300">View details →</a>
                </article>
            @empty
                <div class="bg-surface p-10 text-center lg:col-span-3">
                    <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">// coming soon</div>
                    <h3 class="mt-4 font-display text-3xl text-ink">No videos available yet</h3>
                    <p class="mx-auto mt-3 max-w-md text-base leading-7 text-dim">Once real videos are published, this page will show walkthroughs, demos, and technical explainers.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-10">{{ $videos->links() }}</div>
    </div>
</section>
@endsection
