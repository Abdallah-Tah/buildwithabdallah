@extends('layouts.app', ['title' => 'Tutorials • Build With Abdallah'])

@section('content')
<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="max-w-3xl">
        <p class="section-eyebrow">Tutorials</p>
        <h1 class="section-title">Practical tutorials for software, automation, and API work</h1>
        <p class="mt-5 text-base leading-8 text-slate-600">Useful implementation notes, Laravel build logs, automation guides, and API patterns from real work.</p>
    </div>

    <div class="mt-10 card-surface">
        <form method="GET" action="{{ route('tutorials.index') }}" class="grid gap-4 lg:grid-cols-[1fr_auto]">
            <div>
                <label class="label-text" for="tutorial-search">Search tutorials</label>
                <input id="tutorial-search" name="search" value="{{ $search }}" class="input-field-light" placeholder="Search by title, excerpt, or content">
            </div>
            <div class="flex items-end">
                <button type="submit" class="primary-button">Search</button>
            </div>
        </form>

        <div class="mt-6 flex flex-wrap gap-3">
            <a href="{{ route('tutorials.index') }}" class="filter-pill {{ $activeCategory === '' ? 'filter-pill-active' : '' }}">All</a>
            @foreach($categories as $category)
                <a href="{{ route('tutorials.index', ['category' => $category->slug, 'search' => $search ?: null]) }}" class="filter-pill {{ $activeCategory === $category->slug ? 'filter-pill-active' : '' }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>

    @if($featuredTutorial)
        <article class="mt-10 card-surface border-blue-200 bg-gradient-to-r from-white to-blue-50">
            <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                <div>
                    <div class="inline-flex rounded-full bg-brand-blue px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-white">Featured tutorial</div>
                    <h2 class="mt-4 text-3xl font-semibold text-brand-navy">{{ $featuredTutorial->title }}</h2>
                    <p class="mt-4 text-base leading-8 text-slate-600">{{ $featuredTutorial->excerpt }}</p>
                </div>
                <div>
                    <a href="{{ route('tutorials.show', $featuredTutorial->slug) }}" class="primary-button">Read Featured Tutorial</a>
                </div>
            </div>
        </article>
    @endif

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        @forelse($posts as $post)
            <article class="card-surface flex flex-col">
                <div class="flex items-center justify-between gap-3">
                    <div class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $post->category?->name ?? 'Tutorial' }}</div>
                    @if($post->featured)
                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-brand-blue">Featured</span>
                    @endif
                </div>
                <h2 class="mt-4 text-2xl font-semibold text-brand-navy">{{ $post->title }}</h2>
                <p class="mt-3 flex-1 text-sm leading-7 text-slate-600">{{ $post->excerpt }}</p>
                <a href="{{ route('tutorials.show', $post->slug) }}" class="mt-6 inline-flex text-sm font-semibold text-brand-blue">Read tutorial →</a>
            </article>
        @empty
            <div class="card-surface lg:col-span-3">No tutorials matched your search yet.</div>
        @endforelse
    </div>
    <div class="mt-10">{{ $posts->links() }}</div>
</section>
@endsection
