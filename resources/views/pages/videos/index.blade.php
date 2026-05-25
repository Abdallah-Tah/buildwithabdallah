@extends('layouts.app', ['title' => 'Videos • Build With Abdallah'])

@section('content')
<section class="page-section pt-16 sm:pt-20">
    <div class="max-w-3xl">
        <p class="section-eyebrow">Videos</p>
        <h1 class="section-title">Professional technical videos for builders and businesses</h1>
        <p class="mt-5 text-base leading-8 text-slate-600">Short explainers, walkthroughs, and implementation content focused on real software delivery.</p>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        @forelse($videos as $video)
            <article class="card-surface flex flex-col">
                <div class="aspect-video overflow-hidden rounded-2xl border border-blue-100 bg-slate-100">
                    <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}" title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                </div>
                <h2 class="mt-5 text-2xl font-semibold text-brand-navy">{{ $video->title }}</h2>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($video->description, 120) }}</p>
                <a href="{{ route('videos.show', $video->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-brand-blue">View details →</a>
            </article>
        @empty
            <div class="empty-state lg:col-span-3">
                <h3 class="text-xl font-semibold text-brand-navy">No videos available yet</h3>
                <p class="mt-3 text-sm leading-7 text-slate-600">Once real videos are published, this page will show walkthroughs, demos, and technical explainers.</p>
            </div>
        @endforelse
    </div>
    <div class="mt-10">{{ $videos->links() }}</div>
</section>
@endsection
