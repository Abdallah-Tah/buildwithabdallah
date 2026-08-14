@extends('layouts.app', [
    'title' => 'Journal — Build With Abdallah',
    'metaDescription' => 'Implementation notes, Laravel build logs, automation guides and API patterns from real production work.',
])

@section('content')

{{-- ================================================================= HERO --}}
<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_25%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-20">
        <nav aria-label="Breadcrumb" class="reveal mb-8 flex items-center gap-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
            <a href="{{ route('home') }}" class="transition hover:text-ink2">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink2">Journal</span>
        </nav>

        <div class="eyebrow reveal">Journal</div>
        <h1 class="reveal mt-4 max-w-[16ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl" data-delay="1">
            Tutorials &amp; <span class="text-brand-500">field notes</span>.
        </h1>
        <p class="reveal mt-6 max-w-[56ch] text-lg leading-relaxed text-dim" data-delay="2">
            Implementation notes, Laravel build logs, automation guides and API patterns &mdash; all
            from work that actually shipped.
        </p>
    </div>
</section>

{{-- ============================================================== FILTERS --}}
<section class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1280px] px-5 py-6 lg:px-10">
        <div class="reveal flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            {{-- Scrolls sideways instead of wrapping into a tall stack on a phone. --}}
            <div class="-mx-5 overflow-x-auto px-5 lg:mx-0 lg:overflow-visible lg:px-0 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <div class="flex w-max gap-2 lg:w-auto lg:flex-wrap">
                    <a href="{{ route('tutorials.index') }}"
                       @class([
                           'whitespace-nowrap rounded-sm px-4 py-2.5 text-sm font-medium transition',
                           'bg-brand-500 text-brand-ink' => $activeCategory === '',
                           'border border-line bg-surface text-ink2 hover:border-lineH hover:text-ink' => $activeCategory !== '',
                       ])>All</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('tutorials.index', ['category' => $category->slug, 'search' => $search ?: null]) }}"
                           @class([
                               'whitespace-nowrap rounded-sm px-4 py-2.5 text-sm font-medium transition',
                               'bg-brand-500 text-brand-ink' => $activeCategory === $category->slug,
                               'border border-line bg-surface text-ink2 hover:border-lineH hover:text-ink' => $activeCategory !== $category->slug,
                           ])>{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>

            {{-- The search control previously used a fixed-width input plus a
                 separate button, which ran past a 320px viewport. --}}
            <form method="GET" action="{{ route('tutorials.index') }}" class="flex min-w-0 gap-2">
                @if ($activeCategory)
                    <input type="hidden" name="category" value="{{ $activeCategory }}">
                @endif
                <label for="tutorial-search" class="sr-only">Search tutorials</label>
                <div class="flex h-11 min-w-0 flex-1 items-center gap-2 rounded-sm border border-line bg-surface px-3.5 transition focus-within:border-brand-500 lg:w-64 lg:flex-none">
                    <svg class="h-4 w-4 flex-none text-mute" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input id="tutorial-search" type="search" name="search" value="{{ $search }}" placeholder="Search&hellip;"
                           class="min-w-0 flex-1 bg-transparent text-sm text-ink outline-none placeholder:text-faint">
                </div>
                <button type="submit" class="h-11 flex-none rounded-sm border border-line bg-surface px-4 text-sm text-ink2 transition hover:border-lineH hover:text-ink">
                    Search
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ============================================================= FEATURED --}}
@if ($featuredTutorial)
    <section class="border-b border-line">
        <div class="mx-auto max-w-[1280px] px-5 py-14 lg:px-10">
            <article class="reveal group grid grid-cols-1 overflow-hidden rounded-lg border border-line bg-surface lg:grid-cols-[1.2fr_minmax(0,1fr)]">
                <x-post-cover :post="$featuredTutorial" aspect="aspect-[16/10] lg:aspect-auto lg:h-full" letter="text-8xl">
                    <span class="absolute left-4 top-4 rounded-xs border border-line bg-bg/80 px-2 py-1 font-mono text-2xs uppercase tracking-[0.12em] text-brand-read">&starf; Featured</span>
                </x-post-cover>
                <div class="flex flex-col p-7 lg:p-10">
                    <div class="flex flex-wrap items-center gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                        <span>{{ $featuredTutorial->category?->name ?? 'Tutorial' }}</span>
                        <span class="h-1 w-1 rounded-full bg-mute"></span>
                        <span>{{ max(1, (int) ceil(str_word_count(strip_tags($featuredTutorial->body ?? '')) / 200)) }} min read</span>
                    </div>
                    <h2 class="mt-4 font-display text-2xl leading-snug text-ink lg:text-3xl">{{ $featuredTutorial->title }}</h2>
                    <p class="mt-4 flex-1 leading-relaxed text-dim">{{ $featuredTutorial->excerpt }}</p>
                    <a href="{{ route('tutorials.show', $featuredTutorial->slug) }}"
                       class="ul-link mt-6 inline-flex items-center gap-2 self-start text-brand-read">
                        <span class="font-mono text-2xs uppercase tracking-[0.1em]">Read featured tutorial</span>
                        <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </article>
        </div>
    </section>
@endif

{{-- ================================================================= GRID --}}
<section class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-20">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $index => $post)
                {{-- `relative` anchors the stretched link on the title below. --}}
                <article class="reveal group relative flex flex-col overflow-hidden rounded-lg border border-line bg-surface transition hover:border-lineH" @if ($index > 0) data-delay="{{ min($index, 5) }}" @endif>
                    <x-post-cover :post="$post">
                        <span class="absolute left-3 top-3 rounded-xs border border-line bg-bg/80 px-2 py-1 font-mono text-2xs uppercase tracking-[0.12em] text-brand-read">Tutorial</span>
                        @if ($post->featured)
                            <span class="absolute right-3 top-3 rounded-xs border border-line bg-bg/80 px-2 py-1 font-mono text-2xs text-live">&starf;</span>
                        @endif
                    </x-post-cover>
                    <div class="flex flex-1 flex-col p-6">
                        <div class="flex flex-wrap items-center gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                            <span>{{ $post->category?->name ?? 'Tutorial' }}</span>
                            <span class="h-1 w-1 rounded-full bg-mute"></span>
                            <span>{{ max(1, (int) ceil(str_word_count(strip_tags($post->body ?? '')) / 200)) }} min</span>
                        </div>
                        <h2 class="mt-3 font-display text-xl leading-snug text-ink transition group-hover:text-brand-read">
                            <a href="{{ route('tutorials.show', $post->slug) }}" class="after:absolute after:inset-0">{{ $post->title }}</a>
                        </h2>
                        <p class="mt-3 line-clamp-2 flex-1 text-sm text-dim">{{ $post->excerpt }}</p>
                        <div class="mt-5 flex items-center justify-between">
                            <span class="font-mono text-2xs text-mute">{{ $post->created_at?->format('M d, Y') ?? 'Recently' }}</span>
                            <span aria-hidden="true" class="text-brand-read transition group-hover:translate-x-0.5">&rarr;</span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-lg border border-dashed border-line bg-surface p-16 text-center">
                    <div class="eyebrow justify-center">Coming soon</div>
                    <h2 class="mt-4 font-display text-2xl text-ink">No tutorials match yet</h2>
                    <p class="mx-auto mt-3 max-w-md text-dim">
                        Once posts are published they will appear here &mdash; Laravel, automation, APIs
                        and implementation notes.
                    </p>
                </div>
            @endforelse
        </div>

        @if ($posts->hasPages())
            <div class="mt-12">{{ $posts->links() }}</div>
        @endif
    </div>
</section>

@endsection
