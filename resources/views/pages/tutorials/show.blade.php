@extends('layouts.app', ['title' => ($post->meta_title ?: $post->title) . ' — Build With Abdallah'])

@section('content')
{{-- Article Header --}}
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 pt-20 pb-16">
        <nav class="reveal flex items-center gap-2 text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <a href="{{ route('tutorials.index') }}" class="hover:text-ink2 transition">Journal</a>
            <span>/</span>
            <span class="text-ink2 truncate max-w-[200px]">{{ $post->title }}</span>
        </nav>

        <div class="max-w-4xl">
            <div class="reveal flex items-center gap-4 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">
                <span class="px-2 py-1 rounded-xs border border-brand-500/40 bg-brand-500/10 text-brand-400">
                    {{ $post->category?->name ?? 'Tutorial' }}
                </span>
                <span>{{ ceil(str_word_count(strip_tags($post->body ?? '')) / 200) }} min read</span>
                <span>{{ $post->created_at?->format('M d, Y') ?? 'Recently' }}</span>
            </div>

            <h1 class="reveal mt-6 font-display text-4xl lg:text-5xl text-ink leading-tight" data-delay="1">
                {{ $post->title }}
            </h1>

            <p class="reveal mt-6 text-xl text-dim leading-relaxed" data-delay="2">
                {{ $post->excerpt }}
            </p>

            <div class="reveal mt-8 flex items-center gap-4" data-delay="3">
                <div class="w-12 h-12 rounded-full bg-surface border border-line flex items-center justify-center">
                    <span class="font-display text-xl text-brand-400">A</span>
                </div>
                <div>
                    <div class="text-ink font-medium">Abdallah Mohamed</div>
                    <div class="text-sm text-mute">Senior Full-Stack Engineer</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Article Content --}}
<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_280px] gap-12">
            {{-- Main Content --}}
            <article class="prose prose-lg max-w-none
                prose-headings:font-display prose-headings:text-ink prose-headings:font-semibold
                prose-h2:text-3xl prose-h2:mt-12 prose-h2:mb-6
                prose-h3:text-2xl prose-h3:mt-10 prose-h3:mb-4
                prose-p:text-ink2 prose-p:leading-relaxed
                prose-a:text-brand-400 prose-a:no-underline hover:prose-a:text-brand-300
                prose-strong:text-ink prose-strong:font-semibold
                prose-code:text-brand-400 prose-code:bg-surface prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded-xs prose-code:text-sm prose-code:font-normal prose-code:before:content-none prose-code:after:content-none
                prose-pre:bg-bg prose-pre:border prose-pre:border-line prose-pre:rounded-md
                prose-blockquote:border-l-brand-500 prose-blockquote:text-dim prose-blockquote:not-italic
                prose-li:text-ink2
                prose-img:rounded-md prose-img:border prose-img:border-line
            ">
                {!! \Illuminate\Support\Str::markdown($post->body, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
            </article>

            {{-- Sidebar --}}
            <aside class="hidden lg:block">
                <div class="sticky top-24 space-y-6">
                    {{-- Share --}}
                    <div class="rounded-lg border border-line bg-surface/60 p-5">
                        <div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-4">Share</div>
                        <div class="flex gap-2">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener"
                               class="w-10 h-10 rounded-sm border border-line bg-bg hover:border-lineH hover:bg-elev/60 flex items-center justify-center transition">
                                <svg class="w-4 h-4 text-ink2" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" rel="noopener"
                               class="w-10 h-10 rounded-sm border border-line bg-bg hover:border-lineH hover:bg-elev/60 flex items-center justify-center transition">
                                <svg class="w-4 h-4 text-ink2" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <button onclick="navigator.clipboard.writeText('{{ request()->url() }}')"
                               class="w-10 h-10 rounded-sm border border-line bg-bg hover:border-lineH hover:bg-elev/60 flex items-center justify-center transition">
                                <svg class="w-4 h-4 text-ink2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Tags --}}
                    @if($post->tags && $post->tags->count() > 0)
                    <div class="rounded-lg border border-line bg-surface/60 p-5">
                        <div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-4">Tags</div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <span class="px-2 py-1 rounded-xs border border-line bg-bg text-[0.6875rem] font-mono text-ink2">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- CTA --}}
                    <div class="rounded-lg border border-brand-500/40 bg-brand-500/10 p-5">
                        <div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-brand-400 mb-3">Need help?</div>
                        <p class="text-sm text-dim mb-4">Want to implement something similar? Let's talk about your project.</p>
                        <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 text-sm text-brand-400 hover:text-brand-300">
                            <span>Get in touch</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- Related Posts --}}
@if($relatedPosts->isNotEmpty())
<section class="bg-surface/30">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-20">
        <div class="reveal flex items-end justify-between mb-10">
            <div>
                <div class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-500">// related</div>
                <h2 class="mt-3 font-display text-3xl text-ink">More tutorials</h2>
            </div>
            <a href="{{ route('tutorials.index') }}" class="font-mono text-xs uppercase tracking-[0.14em] text-mute hover:text-ink2 ul-link">All posts →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $index => $relatedPost)
                <article class="reveal group rounded-lg border border-line hover:border-lineH bg-bg/40 overflow-hidden transition" @if($index > 0) data-delay="{{ $index }}" @endif>
                    <div class="relative aspect-[16/10] bg-gradient-to-br from-[#0a0e1a] via-[#0e0e10] to-[#0a0a0a] overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-grid-dark bg-grid-sm opacity-30"></div>
                        <span class="relative font-display text-5xl text-ink/40">{{ strtoupper(substr($relatedPost->title, 0, 1)) }}</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-display text-lg text-ink leading-snug group-hover:text-brand-400 transition">{{ $relatedPost->title }}</h3>
                        <p class="mt-2 text-sm text-dim line-clamp-2">{{ \Illuminate\Support\Str::limit($relatedPost->excerpt, 100) }}</p>
                        <a href="{{ route('tutorials.show', $relatedPost->slug) }}" class="mt-4 inline-flex items-center gap-1 text-sm text-brand-400 hover:text-brand-300">
                            Read <span>→</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
