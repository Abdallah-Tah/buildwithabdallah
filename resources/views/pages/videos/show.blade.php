@extends('layouts.app', ['title' => ($video->meta_title ?: $video->title) . ' — Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-[1100px] px-6 lg:px-10 py-20">
    <nav class="reveal flex items-center gap-2 text-xs font-mono uppercase tracking-[0.14em] text-mute mb-8">
        <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
        <span>/</span>
        <a href="{{ route('videos.index') }}" class="hover:text-ink2 transition">Videos</a>
        <span>/</span>
        <span class="text-ink2">{{ $video->category?->name ?? 'Video' }}</span>
    </nav>

    <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">{{ $video->category?->name ?? 'Video' }}</div>
    <h1 class="mt-5 font-display text-5xl lg:text-6xl text-ink">{{ $video->title }}</h1>
    <p class="mt-6 text-lg leading-8 text-dim">{{ $video->description }}</p>
    <div class="mt-10 overflow-hidden rounded-lg border border-line bg-surface shadow-card">
        <div class="aspect-video">
            <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
        </div>
    </div>

    @if($relatedVideos->isNotEmpty())
        <div class="mt-16">
            <div class="text-xs font-mono uppercase tracking-[0.18em] text-brand-500">// more videos</div>
            <h2 class="mt-4 font-display text-4xl text-ink">More videos</h2>
            <div class="mt-8 grid gap-px overflow-hidden rounded-md border border-line/70 bg-line/60 md:grid-cols-3">
                @foreach($relatedVideos as $relatedVideo)
                    <a href="{{ route('videos.show', $relatedVideo->slug) }}" class="block bg-surface p-6 hover:bg-elev/70 transition">
                        <h3 class="text-xl font-semibold text-ink">{{ $relatedVideo->title }}</h3>
                        <p class="mt-3 text-base leading-7 text-dim">{{ \Illuminate\Support\Str::limit($relatedVideo->description, 100) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
