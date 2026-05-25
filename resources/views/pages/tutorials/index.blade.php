@extends('layouts.app', ['title' => 'Journal — Build With Abdallah'])

@section('content')
{{-- Hero --}}
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 pt-20 pb-24">
        <nav class="reveal flex items-center gap-2 text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">Journal</span>
        </nav>

        <div class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-500 reveal">// journal</div>
        <h1 class="reveal mt-4 font-display text-5xl lg:text-6xl text-ink max-w-[800px]" data-delay="1">
            Tutorials & <span class="text-brand-500 italic">field notes</span>.
        </h1>
        <p class="reveal mt-6 text-dim text-lg max-w-[600px]" data-delay="2">
            Useful implementation notes, Laravel build logs, automation guides, and API patterns from real work.
        </p>
    </div>
</section>

{{-- Filters & Search --}}
<section class="border-b border-line/70 bg-surface/30">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-8">
        <div class="reveal flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            {{-- Category Pills --}}
            <div class="flex flex-wrap gap-2" x-data="{ active: '{{ $activeCategory }}' }">
                <a href="{{ route('tutorials.index') }}"
                   class="px-4 py-2 rounded-sm text-sm font-medium transition {{ $activeCategory === '' ? 'bg-brand-500 text-brand-ink' : 'border border-line bg-bg/40 text-ink2 hover:border-lineH hover:text-ink' }}">
                    All
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('tutorials.index', ['category' => $category->slug, 'search' => $search ?: null]) }}"
                       class="px-4 py-2 rounded-sm text-sm font-medium transition {{ $activeCategory === $category->slug ? 'bg-brand-500 text-brand-ink' : 'border border-line bg-bg/40 text-ink2 hover:border-lineH hover:text-ink' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            {{-- Search --}}
            <form method="GET" action="{{ route('tutorials.index') }}" class="flex gap-2">
                @if($activeCategory)
                    <input type="hidden" name="category" value="{{ $activeCategory }}">
                @endif
                <div class="flex items-center gap-2 px-4 h-10 rounded-sm border border-line bg-bg focus-within:border-brand-500 transition">
                    <svg class="w-4 h-4 text-mute" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search tutorials..." class="bg-transparent outline-none text-sm text-ink placeholder-faint w-48">
                </div>
                <button type="submit" class="h-10 px-4 rounded-sm bg-surface border border-line text-ink2 hover:border-lineH hover:text-ink text-sm transition">
                    Search
                </button>
            </form>
        </div>
    </div>
</section>

{{-- Featured Tutorial --}}
@if($featuredTutorial)
<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-16">
        <article class="reveal rounded-lg border border-line bg-surface overflow-hidden grid grid-cols-1 lg:grid-cols-[1.2fr_1fr]">
            <div class="relative aspect-[16/10] lg:aspect-auto bg-gradient-to-br from-[#0a0e1a] via-[#0e0e10] to-[#0a0a0a] overflow-hidden flex items-center justify-center">
                <div class="absolute inset-0 bg-grid-dark bg-grid-sm opacity-40"></div>
                <span class="relative font-display text-8xl text-ink/30">{{ strtoupper(substr($featuredTutorial->title, 0, 1)) }}</span>
                <span class="absolute top-4 left-4 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-400 bg-bg/80 border border-line/60 px-2 py-1 rounded-xs">★ Featured</span>
            </div>
            <div class="p-8 lg:p-10 flex flex-col">
                <div class="flex items-center gap-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">
                    <span>{{ $featuredTutorial->category?->name ?? 'Tutorial' }}</span>
                    <span class="w-1 h-1 rounded-full bg-mute"></span>
                    <span>{{ ceil(str_word_count(strip_tags($featuredTutorial->body ?? '')) / 200) }} min read</span>
                </div>
                <h2 class="mt-4 font-display text-3xl text-ink">{{ $featuredTutorial->title }}</h2>
                <p class="mt-4 text-dim leading-relaxed flex-1">{{ $featuredTutorial->excerpt }}</p>
                <a href="{{ route('tutorials.show', $featuredTutorial->slug) }}"
                   class="mt-6 inline-flex items-center gap-2 text-brand-400 hover:text-brand-300 self-start">
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em]">Read featured tutorial</span>
                    <span>→</span>
                </a>
            </div>
        </article>
    </div>
</section>
@endif

{{-- Tutorials Grid --}}
<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $index => $post)
                <article class="reveal group rounded-lg border border-line hover:border-lineH bg-bg/40 overflow-hidden transition" @if($index > 0) data-delay="{{ min($index, 5) }}" @endif>
                    <div class="relative aspect-[16/10] bg-gradient-to-br from-[#0a0e1a] via-[#0e0e10] to-[#0a0a0a] overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-grid-dark bg-grid-sm opacity-30"></div>
                        <span class="relative font-display text-6xl text-ink/40">{{ strtoupper(substr($post->title, 0, 1)) }}</span>
                        <span class="absolute top-3 left-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-400 bg-bg/80 border border-line/60 px-2 py-1 rounded-xs">▸ Tutorial</span>
                        @if($post->featured)
                            <span class="absolute top-3 right-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-live bg-bg/80 border border-line/60 px-2 py-1 rounded-xs">★</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">
                            <span>{{ $post->category?->name ?? 'Tutorial' }}</span>
                            <span class="w-1 h-1 rounded-full bg-mute"></span>
                            <span>{{ ceil(str_word_count(strip_tags($post->body ?? '')) / 200) }} min</span>
                        </div>
                        <h3 class="mt-3 font-display text-xl text-ink leading-snug group-hover:text-brand-400 transition">{{ $post->title }}</h3>
                        <p class="mt-3 text-sm text-dim line-clamp-2">{{ $post->excerpt }}</p>
                        <div class="mt-5 flex items-center justify-between">
                            <span class="text-[0.6875rem] font-mono text-mute">{{ $post->created_at?->format('M d, Y') ?? 'Recently' }}</span>
                            <a href="{{ route('tutorials.show', $post->slug) }}" class="text-brand-400 group-hover:translate-x-0.5 transition">→</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-lg border border-dashed border-line bg-surface/40 p-16 text-center">
                    <div class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-500 mb-4">// coming soon</div>
                    <h3 class="font-display text-2xl text-ink">No tutorials available yet</h3>
                    <p class="mt-3 text-dim max-w-md mx-auto">Once real posts are published, this page will list tutorials for Laravel, automation, APIs, and implementation notes.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
