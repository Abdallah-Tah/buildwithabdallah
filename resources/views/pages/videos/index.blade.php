@extends('layouts.app', ['title' => 'Videos • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <p class="section-eyebrow">Videos</p>
    <h1 class="section-title max-w-3xl">Walkthroughs, lessons, and short technical videos</h1>
    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        @foreach($videos as $video)
            <article class="card-panel flex flex-col">
                <div class="aspect-video overflow-hidden rounded-2xl border border-white/10 bg-slate-900">
                    <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                </div>
                <h2 class="mt-5 text-2xl font-semibold text-white">{{ $video->title }}</h2>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-400">{{ \Illuminate\Support\Str::limit($video->description, 120) }}</p>
                <a href="{{ route('videos.show', $video->slug) }}" class="mt-6 inline-flex text-sm font-medium text-cyan-300">View details →</a>
            </article>
        @endforeach
    </div>
    <div class="mt-10">{{ $videos->links() }}</div>
</section>
@endsection
