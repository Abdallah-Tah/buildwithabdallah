@extends('layouts.app', [
    'title' => $study['title'].' | Build With Abdallah',
    'metaDescription' => $study['summary'],
])

@section('content')
<article>
    <header class="relative overflow-hidden border-b border-line bg-panel">
        <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid opacity-45 [mask-image:linear-gradient(to_bottom,#000,transparent_90%)]"></div>
        <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-24">
            <nav aria-label="Breadcrumb" class="mb-10 flex items-center gap-2 font-mono text-xs uppercase tracking-[0.12em] text-mute">
                <a href="{{ route('home').'#work' }}" class="hover:text-ink">Selected work</a><span>/</span><span class="text-ink2">{{ $study['number'] }}</span>
            </nav>
            <div class="grid items-end gap-10 lg:grid-cols-[1fr_0.55fr]">
                <div><div class="eyebrow">{{ $study['category'] }}</div><h1 class="mt-6 max-w-[14ch] font-display text-5xl font-semibold leading-[.98] tracking-[-0.04em] text-ink sm:text-6xl lg:text-7xl">{{ $study['title'] }}</h1></div>
                <p class="text-lg leading-8 text-dim">{{ $study['summary'] }}</p>
            </div>
        </div>
    </header>

    <section class="border-b border-line">
        <div class="mx-auto grid max-w-[1280px] gap-12 px-5 py-20 lg:grid-cols-[0.65fr_1.35fr] lg:px-10 lg:py-28">
            <div><div class="eyebrow">The challenge</div><h2 class="mt-5 font-display text-4xl font-semibold tracking-tight text-ink">Operational context before implementation.</h2></div>
            <div class="space-y-6">@foreach ($study['challenge'] as $paragraph)<p class="text-lg leading-8 text-dim">{{ $paragraph }}</p>@endforeach</div>
        </div>
    </section>

    <section class="border-b border-line bg-panel/40">
        <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
            <div class="eyebrow">Engineering approach</div>
            <div class="mt-10 divide-y divide-line border-y border-line">
                @foreach ($study['engineering'] as $step)
                    <div class="grid gap-3 py-6 sm:grid-cols-[4rem_1fr]"><span class="font-mono text-xs text-brand-read">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><p class="text-lg leading-8 text-ink2">{{ $step }}</p></div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-b border-line">
        <div class="mx-auto grid max-w-[1280px] gap-12 px-5 py-20 lg:grid-cols-2 lg:px-10 lg:py-24">
            <div><div class="eyebrow">Technical focus</div><div class="mt-7 flex flex-wrap gap-2">@foreach ($study['focus'] as $item)<span class="rounded-full border border-line bg-surface px-4 py-2 text-sm font-medium text-ink2">{{ $item }}</span>@endforeach</div></div>
            <div><div class="eyebrow">Resulting approach</div><p class="mt-6 text-lg leading-8 text-dim">{{ $study['result'] }}</p></div>
        </div>
    </section>

    <section class="bg-navy-900 text-white">
        <div class="mx-auto flex max-w-[1280px] flex-col items-start justify-between gap-8 px-5 py-16 sm:flex-row sm:items-center lg:px-10">
            <div><div class="font-mono text-xs uppercase tracking-[0.15em] text-brand-300">Related requirements?</div><h2 class="mt-3 font-display text-3xl font-semibold">Discuss the system and its constraints.</h2></div>
            <a href="{{ route('contact.index', ['project_type' => str_contains($caseStudy, 'quality') ? 'Manufacturing' : 'Support / Modernization']) }}" class="inline-flex min-h-12 items-center rounded-sm bg-brand-400 px-6 py-3 font-semibold text-brand-ink">Start a technical conversation <span class="ml-2">&rarr;</span></a>
        </div>
    </section>
</article>
@endsection
