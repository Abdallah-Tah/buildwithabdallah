@extends('layouts.app', ['title' => $video->meta_title ?: $video->title])

@section('content')
<section class="mx-auto max-w-5xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $video->category?->name ?? 'Video' }}</div>
    <h1 class="mt-4 text-4xl font-semibold tracking-tight text-brand-navy">{{ $video->title }}</h1>
    <p class="mt-6 text-lg leading-8 text-slate-600">{{ $video->description }}</p>
    <div class="mt-10 overflow-hidden rounded-3xl border border-blue-100 bg-slate-100 shadow-sm">
        <div class="aspect-video">
            <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
        </div>
    </div>

    @if($relatedVideos->isNotEmpty())
        <div class="mt-16">
            <h2 class="text-2xl font-semibold text-brand-navy">More videos</h2>
            <div class="mt-6 grid gap-6 md:grid-cols-3">
                @foreach($relatedVideos as $relatedVideo)
                    <a href="{{ route('videos.show', $relatedVideo->slug) }}" class="card-surface block">
                        <h3 class="text-lg font-semibold text-brand-navy">{{ $relatedVideo->title }}</h3>
                        <p class="mt-3 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($relatedVideo->description, 100) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
