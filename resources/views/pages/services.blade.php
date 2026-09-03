@extends('layouts.app', [
    'title' => 'Software Development & IT Consulting Services | Build With Abdallah',
    'metaDescription' => 'Custom software development, legacy modernization, API integration, SQL database solutions, automation and application support from Maine.',
])

@section('content')

{{-- ================================================================= HERO --}}
<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_20%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-24">
        <nav aria-label="Breadcrumb" class="reveal mb-8 flex items-center gap-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
            <a href="{{ route('home') }}" class="transition hover:text-ink2">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink2">Services</span>
        </nav>

        <div class="grid items-end gap-10 lg:grid-cols-[1fr_minmax(0,420px)]">
            <div>
                <div class="eyebrow reveal">Software Development &amp; IT Consulting</div>
                <h1 class="reveal mt-5 max-w-[18ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl" data-delay="1">
                    Systems built, integrated and <span class="motion-accent text-brand-500">modernized responsibly.</span>
                </h1>
            </div>
            <p class="reveal max-w-[52ch] text-lg leading-relaxed text-dim" data-delay="2">
                Engineering services for organizations that need dependable applications, connected
                systems, better data workflows and ongoing technical support.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================== CATALOGUE --}}
<section class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="grid gap-px overflow-hidden rounded-md border border-line bg-line md:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $index => $service)
                @php
                    // Split the trailing price sentence out of the description so it
                    // can sit in its own slot rather than trailing the paragraph.
                    $copy = $service['description'];
                    $price = null;
                    if (preg_match('/\s*((?:Starting from \$[\d,]+|Quote after review))\.?\s*$/u', $copy, $m)) {
                        $price = $m[1];
                        $copy = trim(preg_replace('/\s*(?:Starting from \$[\d,]+|Quote after review)\.?\s*$/u', '', $copy));
                    }
                @endphp
                <article class="reveal motion-card flex flex-col bg-surface p-7 transition hover:bg-elev lg:p-8" @if ($index > 0) data-delay="{{ min($index, 6) }}" @endif>
                    <div class="flex items-center justify-between gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                        <span>{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }} / {{ str_pad((string) count($services), 2, '0', STR_PAD_LEFT) }}</span>
                        @if ($price)
                            <span class="text-brand-read">{{ $price }}</span>
                        @endif
                    </div>
                    <h2 class="mt-6 font-display text-2xl text-ink">{{ $service['title'] }}</h2>
                    <p class="mt-3 flex-1 leading-relaxed text-dim">{{ $copy }}</p>
                    <a href="{{ route('contact.index') }}"
                       class="ul-link mt-6 inline-flex items-center gap-2 self-start font-mono text-2xs uppercase tracking-[0.1em] text-brand-read">
                        Start here <span aria-hidden="true">&rarr;</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================== PROCESS --}}
<section class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="reveal mb-14 max-w-[46ch]">
            <div class="eyebrow">Process</div>
            <h2 class="mt-4 font-display text-3xl tracking-tight text-ink sm:text-4xl lg:text-5xl">
                Four steps, no surprises.
            </h2>
        </div>

        <ol class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['Intro call', 'Twenty minutes. What is broken, who it affects, what done looks like. Free, no NDA needed.'],
                ['Written scope', 'A short document: deliverables, price, timeline and what is explicitly out of scope.'],
                ['Build in the open', 'Weekly demo links against a real environment. You see progress, not status reports.'],
                ['Handover', 'Deployed, documented and walked through on video. You own the code and the infrastructure.'],
            ] as $index => [$heading, $copy])
                <li class="reveal motion-card flex flex-col rounded-lg border border-line bg-surface p-7" @if ($index > 0) data-delay="{{ $index }}" @endif>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-brand-500/12 font-mono text-2xs text-brand-read">
                        {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <h3 class="mt-5 font-display text-xl text-ink">{{ $heading }}</h3>
                    <p class="mt-3 leading-relaxed text-dim">{{ $copy }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- ================================================================== CTA --}}
<section class="relative overflow-hidden">
    <div class="pointer-events-none absolute inset-0 bg-brand-glow"></div>
    <div class="relative mx-auto max-w-[1280px] px-5 py-24 text-center lg:px-10">
        <h2 class="reveal mx-auto max-w-[20ch] font-display text-3xl tracking-tight text-ink sm:text-4xl lg:text-5xl">
            Not sure which one fits?
        </h2>
        <p class="reveal mx-auto mt-6 max-w-[50ch] text-lg text-dim" data-delay="1">
            Describe the problem and I'll tell you which of these it is &mdash; or that you don't need me.
        </p>
        <div class="reveal mt-9 flex flex-col justify-center gap-3 sm:flex-row" data-delay="2">
            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic inline-flex items-center justify-center gap-3 rounded-sm bg-brand-500 px-7 py-4 font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400">
                Discuss Your Project
            </a>
            <a href="{{ route('home') }}#work"
               class="inline-flex items-center justify-center rounded-sm border border-line bg-surface px-6 py-4 text-ink transition hover:border-lineH hover:bg-elev">
                View Selected Work
            </a>
        </div>
    </div>
</section>

@endsection
