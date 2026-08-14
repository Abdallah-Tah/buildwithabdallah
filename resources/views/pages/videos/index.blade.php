@extends('layouts.app', [
    'title' => 'Videos — Build With Abdallah',
    'metaDescription' => 'Short video walkthroughs, demos and technical explainers on Laravel, automation and AI agents.',
])

@section('content')

<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_25%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-20">
        <nav aria-label="Breadcrumb" class="reveal mb-8 flex items-center gap-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
            <a href="{{ route('home') }}" class="transition hover:text-ink2">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink2">Videos</span>
        </nav>

        <div class="eyebrow reveal">Videos</div>
        <h1 class="reveal mt-4 max-w-[16ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl" data-delay="1">
            Walkthroughs and <span class="text-brand-500">demos</span>.
        </h1>
        <p class="reveal mt-6 max-w-[56ch] text-lg leading-relaxed text-dim" data-delay="2">
            Short technical explainers recorded against real projects &mdash; no placeholder content.
        </p>
    </div>
</section>

<section class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-20">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($videos as $index => $video)
                <article class="reveal flex flex-col overflow-hidden rounded-lg border border-line bg-surface transition hover:border-lineH" @if ($index > 0) data-delay="{{ min($index, 5) }}" @endif>
                    <div class="aspect-video border-b border-line bg-panel">
                        <iframe class="h-full w-full" src="{{ $video->youtube_embed_url }}"
                                title="{{ $video->title }}" loading="lazy" allowfullscreen></iframe>
                    </div>
                    <div class="flex flex-1 flex-col p-6">
                        @if ($video->category)
                            <div class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">{{ $video->category->name }}</div>
                        @endif
                        <h2 class="mt-3 font-display text-xl leading-snug text-ink">{{ $video->title }}</h2>
                        <p class="mt-3 flex-1 text-sm leading-relaxed text-dim">{{ \Illuminate\Support\Str::limit($video->description, 130) }}</p>
                        <a href="{{ route('videos.show', $video->slug) }}"
                           class="ul-link mt-5 inline-flex items-center gap-2 self-start font-mono text-2xs uppercase tracking-[0.1em] text-brand-read">
                            View details <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-lg border border-dashed border-line bg-surface p-16 text-center">
                    <div class="eyebrow justify-center">Coming soon</div>
                    <h2 class="mt-4 font-display text-2xl text-ink">No videos published yet</h2>
                    <p class="mx-auto mt-3 max-w-md text-dim">
                        Once videos are published this page will show walkthroughs, demos and technical explainers.
                    </p>
                </div>
            @endforelse
        </div>

        @if ($videos->hasPages())
            <div class="mt-12">{{ $videos->links() }}</div>
        @endif
    </div>
</section>

@endsection
