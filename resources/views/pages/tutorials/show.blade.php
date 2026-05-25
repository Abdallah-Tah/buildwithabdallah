@extends('layouts.app', ['title' => $post->meta_title ?: $post->title])

@section('content')
<section class="mx-auto max-w-4xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-500">{{ $post->category?->name ?? 'Tutorial' }}</div>
    <h1 class="mt-4 text-4xl font-semibold tracking-tight text-brand-navy">{{ $post->title }}</h1>
    <p class="mt-6 text-lg leading-8 text-slate-600">{{ $post->excerpt }}</p>
    <article class="prose prose-slate mt-10 max-w-none prose-headings:text-brand-navy prose-a:text-brand-blue prose-strong:text-brand-navy prose-code:text-brand-blue">
        {!! \Illuminate\Support\Str::markdown($post->body, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
    </article>

    @if($relatedPosts->isNotEmpty())
        <div class="mt-16">
            <h2 class="text-2xl font-semibold text-brand-navy">More tutorials</h2>
            <div class="mt-6 grid gap-6 md:grid-cols-3">
                @foreach($relatedPosts as $relatedPost)
                    <a href="{{ route('tutorials.show', $relatedPost->slug) }}" class="card-surface block">
                        <h3 class="text-lg font-semibold text-brand-navy">{{ $relatedPost->title }}</h3>
                        <p class="mt-3 text-sm text-slate-600">{{ \Illuminate\Support\Str::limit($relatedPost->excerpt, 100) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</section>
@endsection
