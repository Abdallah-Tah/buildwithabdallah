@extends('layouts.app', [
    'title' => 'Build With Abdallah — Custom software, AI agents & automation',
    'metaDescription' => 'Custom Laravel apps, AI agents, Telegram bots, workflow automation and dashboards — built by a senior full-stack engineer with eight years in production.',
])

@section('content')

{{-- ================================================================= HERO --}}
<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_20%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 pt-16 pb-20 lg:px-10 lg:pt-24 lg:pb-28">
        <div class="grid grid-cols-1 items-start gap-14 lg:grid-cols-[1.05fr_minmax(0,0.95fr)] lg:gap-20">

            <div>
                <div class="reveal flex flex-wrap items-center gap-x-3 gap-y-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                    <span class="inline-flex items-center gap-2 rounded-xs border border-line bg-surface px-2.5 py-1.5">
                        <span class="h-1.5 w-1.5 rounded-full bg-live"></span>
                        <span class="text-ink2">Available for new work</span>
                    </span>
                    <span>Senior full-stack &middot; solo studio</span>
                </div>

                {{-- One flowing headline. The previous version hard-broke lines with
                     <br> and pinned an underline SVG to an inline-block span, which
                     orphaned the comma onto its own line on a phone and let the
                     underline drift past the word it belonged to. --}}
                <h1 class="reveal mt-7 max-w-[22ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl" data-delay="1">
                    Ship faster with <span class="text-brand-500">custom software</span> and AI that works.
                </h1>

                <p class="reveal mt-7 max-w-[54ch] text-lg leading-relaxed text-dim" data-delay="2">
                    I'm Abdallah &mdash; a senior engineer with eight years of production Laravel,
                    Python and Vue. I build what small teams can't afford to get wrong: internal
                    tools, MVPs, AI features, Telegram bots and workflow plumbing. One direct line,
                    no agency markup, no juniors to babysit.
                </p>

                <div class="reveal mt-9 flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center" data-delay="3">
                    <a href="{{ route('contact.index') }}" data-magnetic data-magnetic-strength="0.25"
                       class="magnetic group inline-flex items-center justify-center gap-3 rounded-sm bg-brand-500 px-6 py-4 font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400">
                        <span>Book a 20-min intro</span>
                        <span class="font-mono text-2xs uppercase tracking-[0.12em] opacity-70 transition group-hover:opacity-100">free</span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="transition-transform group-hover:translate-x-0.5">
                            <path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="#work"
                       class="inline-flex items-center justify-center gap-2 rounded-sm border border-line bg-surface px-6 py-4 font-medium text-ink transition hover:border-lineH hover:bg-elev">
                        See selected work
                    </a>
                </div>

                <ul class="reveal mt-10 grid gap-2.5 border-t border-line pt-8 sm:grid-cols-2" data-delay="4">
                    @foreach ($proofPoints as $proofPoint)
                        <li class="flex gap-2.5 text-sm leading-relaxed text-dim">
                            <span aria-hidden="true" class="mt-2 h-1 w-1 flex-none rounded-full bg-brand-500"></span>
                            <span>{{ $proofPoint }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal" data-delay="2">
<pre data-gh-code><code class="language-bash"># who is this for?
$ curl -s buildwithabdallah.com/who | jq
{
  "founders":     "pre-PMF, need an MVP yesterday",
  "ops_leads":    "drowning in spreadsheets &amp; zaps",
  "agencies":     "need a senior to ship the hard bits",
  "in_house_eng": "want a second pair of senior eyes"
}</code></pre>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================== MARQUEE --}}
<section class="overflow-hidden border-b border-line py-6">
    <div class="relative">
        <div class="marquee whitespace-nowrap font-mono text-sm uppercase tracking-[0.14em] text-mute" aria-hidden="true">
            @foreach ([1, 2] as $pass)
                <div class="flex items-center gap-10 px-5">
                    @foreach (['Laravel 12', 'Livewire', 'Vue 3 · Inertia', 'Next.js', 'Python · FastAPI', 'PostgreSQL · Redis', 'OpenAI · Claude · Ollama', 'React Native', 'Tailwind', 'AWS · Hetzner', 'Stripe', 'Telegram Bot API'] as $tech)
                        <span>{{ $tech }}</span><span class="text-faint">/</span>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="pointer-events-none absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-bg to-transparent sm:w-32"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 w-16 bg-gradient-to-l from-bg to-transparent sm:w-32"></div>
    </div>
</section>

{{-- ============================================================= SERVICES --}}
<section id="services" class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="reveal mb-14 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <div class="eyebrow">Services</div>
                <h2 class="mt-4 max-w-[18ch] font-display text-4xl tracking-tight text-ink sm:text-5xl lg:text-6xl">
                    Four ways to put <span class="text-brand-500">a senior engineer</span> on it.
                </h2>
            </div>
            <p class="max-w-md text-base text-dim">
                Fixed-scope sprints for defined deliverables, retainers for ongoing work, agentic AI
                for the moment, and office hours for everything in between.
            </p>
        </div>

        <div class="reveal grid grid-cols-1 gap-px overflow-hidden rounded-md border border-line bg-line md:grid-cols-2">
            <article class="gradient-border relative bg-surface p-7 md:row-span-2 lg:p-9">
                <div class="relative z-10 flex h-full flex-col">
                    <div class="flex items-center justify-between gap-3 font-mono text-2xs uppercase tracking-[0.12em]">
                        <span class="text-brand-read">&starf; Most requested</span>
                        <span class="text-mute">02 / 04</span>
                    </div>
                    <h3 class="mt-7 max-w-[420px] font-display text-3xl leading-tight text-ink lg:text-4xl">
                        AI agents &amp; <span class="text-brand-500">automation</span>
                    </h3>
                    <p class="mt-5 max-w-[460px] leading-relaxed text-dim">
                        Useful AI &mdash; RAG over your docs, scheduled agents that do actual work,
                        Telegram and WhatsApp bots, scrapers, n8n / Make / custom pipelines. Wired
                        into your existing stack without breaking it.
                    </p>

<pre data-gh-code class="mt-7"><code class="language-python"># every 5min: triage new contacts
async def qualify(lead):
    score = await claude.rank(lead.message)
    if score &gt; 0.8:  # ping me on Telegram
        await tg.notify("hot lead", lead)</code></pre>

                    <div class="mt-auto flex flex-wrap items-center justify-between gap-4 pt-8">
                        <div class="flex flex-wrap gap-1.5">
                            @foreach (['OpenAI', 'Claude', 'Ollama', 'Telegram'] as $tool)
                                <span class="rounded-xs border border-line bg-panel px-2 py-1 font-mono text-2xs uppercase tracking-[0.1em] text-ink2">{{ $tool }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('services') }}" class="ul-link inline-flex items-center gap-1.5 font-mono text-sm text-brand-read">
                            Learn more <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </article>

            @foreach ([
                ['n' => '01 / 04', 'meta' => 'from $8k', 'title' => 'Custom software', 'copy' => 'Multi-tenant SaaS, dashboards, internal tools, MVPs. Laravel + Livewire / Inertia or Next.js — whichever fits the team.', 'points' => ['Auth, billing, multi-tenancy from day one', 'Real CI/CD, real backups, real monitoring', 'Handover docs &amp; Loom walkthroughs']],
                ['n' => '03 / 04', 'meta' => 'recurring', 'title' => 'Content &amp; lead-gen', 'copy' => 'Technical tutorials, video walkthroughs, newsletter ops, SEO that actually ranks. The exact playbook used to grow this site.', 'points' => ['Editorial calendar &amp; publishing pipeline', 'Tutorial videos with chapter timestamps', 'Newsletter funnel + CRM']],
                ['n' => '04 / 04', 'meta' => '$250 / 60min', 'title' => 'Office hours', 'copy' => 'A single 60-min call. Architecture review, code-roast, hiring help, AI strategy. Often the cheapest decision you will make this quarter.', 'points' => ['No NDA needed for the first call', 'Recording + notes within 24h', 'Refund if it was not useful']],
            ] as $card)
                <article class="bg-surface p-7 transition hover:bg-elev lg:p-9">
                    <div class="flex items-center justify-between gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                        <span>{{ $card['n'] }}</span>
                        <span>&mdash; {!! $card['meta'] !!}</span>
                    </div>
                    <h3 class="mt-6 font-display text-2xl text-ink lg:text-3xl">{!! $card['title'] !!}</h3>
                    <p class="mt-3 max-w-[460px] text-dim">{!! $card['copy'] !!}</p>
                    <ul class="mt-5 space-y-2 text-sm text-ink2">
                        @foreach ($card['points'] as $point)
                            <li class="flex gap-3"><span class="font-mono text-xs text-brand-500">&rarr;</span> <span>{!! $point !!}</span></li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>

        {{-- The controller already supplies this capability list; the previous
             design never rendered it. --}}
        <div class="reveal mt-12">
            <h3 class="font-mono text-2xs uppercase tracking-[0.14em] text-mute">Also built regularly</h3>
            <div class="mt-5 grid gap-x-8 gap-y-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <div class="border-t border-line pt-4">
                        <div class="font-medium text-ink">{{ $service['title'] }}</div>
                        <p class="mt-1.5 text-sm leading-relaxed text-mute">{{ $service['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ================================================================= WORK --}}
<section id="work" class="relative border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid-sm opacity-40 [mask-image:radial-gradient(ellipse_at_top,#000,transparent_70%)]"></div>
    <div class="relative mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="reveal mb-14 flex flex-wrap items-end justify-between gap-6">
            <div>
                <div class="eyebrow">Selected work</div>
                <h2 class="mt-4 font-display text-4xl tracking-tight text-ink sm:text-5xl lg:text-6xl">
                    What I am <span class="text-brand-500">building</span> now.
                </h2>
            </div>
            <a href="{{ route('contact.index') }}" class="ul-link hidden pb-2 font-mono text-xs uppercase tracking-[0.12em] text-mute hover:text-ink2 md:inline-flex">
                Discuss your project &rarr;
            </a>
        </div>

        <article class="reveal mb-6 grid grid-cols-1 overflow-hidden rounded-lg border border-line bg-surface lg:grid-cols-[1.1fr_minmax(0,1fr)]">
            <div class="relative aspect-[4/3] overflow-hidden bg-panel lg:aspect-auto">
                <img src="https://buildwithabdallah.com/storage/covers/01KXXD1NG9X4YDDVRGCH9SKGV1.png"
                     alt="Kirada rental management application" loading="lazy"
                     class="absolute inset-0 h-full w-full object-cover">
                <span class="absolute left-4 top-4 rounded-xs bg-bg/80 px-2 py-1 font-mono text-2xs uppercase tracking-[0.12em] text-brand-read">&starf; Featured</span>
            </div>
            <div class="flex flex-col p-7 lg:p-10">
                <div class="flex flex-wrap items-center gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                    <span>SaaS &middot; rental management</span>
                    <span class="h-1 w-1 rounded-full bg-brand-500"></span>
                    <span>In development</span>
                </div>
                <h3 class="mt-4 font-display text-3xl text-ink lg:text-4xl">Kirada</h3>
                <p class="mt-4 leading-relaxed text-dim">
                    A connected operating system for rental teams. Kirada brings properties, units,
                    tenants, leases, invoices, payment proofs, maintenance, documents and messaging
                    into one workflow.
                </p>
                <div class="mt-6 grid grid-cols-3 gap-px overflow-hidden rounded-sm border border-line bg-line">
                    @foreach (['01' => 'properties', '02' => 'leases', '03' => 'payments'] as $n => $label)
                        <div class="bg-panel p-3.5">
                            <div class="font-display text-2xl text-ink">{{ $n }}</div>
                            <div class="mt-1 font-mono text-2xs uppercase tracking-[0.1em] text-mute">{{ $label }}</div>
                        </div>
                    @endforeach
                </div>
                <a href="https://kirada.buildwithabdallah.com" target="_blank" rel="noopener noreferrer"
                   class="ul-link mt-auto inline-flex items-center gap-2 self-start pt-7 text-brand-read">
                    <span class="font-mono text-2xs uppercase tracking-[0.1em]">Visit Kirada</span>
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </article>

        <div class="grid gap-6 lg:grid-cols-2">
            <article class="reveal flex flex-col rounded-lg border border-line bg-surface p-7 lg:p-9" data-delay="1">
                <div class="flex flex-wrap items-center gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                    <span>AI &middot; creative automation</span>
                    <span class="h-1 w-1 rounded-full bg-brand-500"></span>
                    <span>In development</span>
                </div>
                <h3 class="mt-4 font-display text-2xl text-ink lg:text-3xl">AI Ad Studio</h3>
                <p class="mt-4 leading-relaxed text-dim">
                    A controlled workflow for turning real product photos into platform-ready video
                    ads. It connects media processing, generation jobs, review states and delivery so
                    teams can create variations without losing the approved product asset.
                </p>
                <div class="mt-5 flex flex-wrap gap-1.5">
                    @foreach (['Python', 'FastAPI', 'Celery', 'AI media'] as $tag)
                        <span class="rounded-xs border border-line bg-panel px-2 py-1 font-mono text-2xs uppercase tracking-[0.1em] text-ink2">{{ $tag }}</span>
                    @endforeach
                </div>
                <a href="https://adstudio.buildwithabdallah.com" target="_blank" rel="noopener noreferrer"
                   class="ul-link mt-auto inline-flex items-center gap-2 self-start pt-7 text-brand-read">
                    <span class="font-mono text-2xs uppercase tracking-[0.1em]">Visit AI Ad Studio</span>
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

            <article class="reveal flex flex-col rounded-lg border border-line bg-surface p-7 lg:p-9" data-delay="2">
                <div class="flex flex-wrap items-center gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                    <span>Platform &middot; integration</span>
                    <span class="h-1 w-1 rounded-full bg-live"></span>
                    <span>Live</span>
                </div>
                <h3 class="mt-4 font-display text-2xl text-ink lg:text-3xl">Central API</h3>
                <p class="mt-4 leading-relaxed text-dim">
                    The single credential boundary between WhatsApp, Stripe and every product I run.
                    Products send one HMAC-signed request instead of integrating providers
                    themselves &mdash; queued, idempotent and fully audited.
                </p>
                <div class="mt-5 flex flex-wrap gap-1.5">
                    @foreach (['Laravel 13', 'HMAC-SHA256', 'Queues', 'Stripe'] as $tag)
                        <span class="rounded-xs border border-line bg-panel px-2 py-1 font-mono text-2xs uppercase tracking-[0.1em] text-ink2">{{ $tag }}</span>
                    @endforeach
                </div>
                <a href="https://api.buildwithabdallah.com/about" target="_blank" rel="noopener noreferrer"
                   class="ul-link mt-auto inline-flex items-center gap-2 self-start pt-7 text-brand-read">
                    <span class="font-mono text-2xs uppercase tracking-[0.1em]">Read the architecture</span>
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </article>
        </div>
    </div>
</section>

{{-- ============================================================== JOURNAL --}}
<section id="journal" class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="reveal mb-12 flex flex-wrap items-end justify-between gap-6">
            <div>
                <div class="eyebrow">Journal</div>
                <h2 class="mt-4 font-display text-4xl text-ink sm:text-5xl">Tutorials &amp; field notes.</h2>
            </div>
            <a href="{{ route('tutorials.index') }}" class="ul-link pb-2 font-mono text-xs uppercase tracking-[0.12em] text-mute hover:text-ink2">All posts &rarr;</a>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @forelse ($latestTutorials as $index => $post)
                <article class="reveal group overflow-hidden rounded-lg border border-line bg-surface transition hover:border-lineH" @if ($index > 0) data-delay="{{ $index }}" @endif>
                    <x-post-cover :post="$post">
                        <span class="absolute left-3 top-3 rounded-xs border border-line bg-bg/80 px-2 py-1 font-mono text-2xs uppercase tracking-[0.12em] text-brand-read">Tutorial</span>
                    </x-post-cover>
                    <div class="p-6">
                        <div class="flex items-center gap-3 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
                            <span>{{ $post->category?->name ?? 'Tutorial' }}</span>
                            <span class="h-1 w-1 rounded-full bg-mute"></span>
                            <span>{{ max(1, (int) ceil(str_word_count(strip_tags($post->body ?? '')) / 200)) }} min</span>
                        </div>
                        <h3 class="mt-3 font-display text-xl leading-snug text-ink transition group-hover:text-brand-read">{{ $post->title }}</h3>
                        <p class="mt-3 line-clamp-2 text-sm text-dim">{{ $post->excerpt }}</p>
                        <div class="mt-5 flex items-center justify-between">
                            <span class="font-mono text-2xs text-mute">{{ $post->created_at?->format('M d, Y') ?? 'Recently' }}</span>
                            <a href="{{ route('tutorials.show', $post->slug) }}" class="text-brand-read transition group-hover:translate-x-0.5" aria-label="Read {{ $post->title }}">&rarr;</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="rounded-lg border border-dashed border-line bg-surface p-12 text-center md:col-span-3">
                    <div class="eyebrow justify-center">Coming soon</div>
                    <h3 class="mt-4 font-display text-2xl text-ink">Tutorials are on the way</h3>
                    <p class="mx-auto mt-3 max-w-md text-dim">Practical Laravel, automation and AI tutorials will appear here once the first articles are published.</p>
                </div>
            @endforelse
        </div>

        @if ($latestVideos->isNotEmpty())
            <div class="reveal mt-14">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <h3 class="font-mono text-2xs uppercase tracking-[0.14em] text-mute">Latest videos</h3>
                    <a href="{{ route('videos.index') }}" class="ul-link font-mono text-2xs uppercase tracking-[0.12em] text-mute hover:text-ink2">All videos &rarr;</a>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    @foreach ($latestVideos as $video)
                        <a href="{{ route('videos.show', $video->slug) }}"
                           class="group flex items-center gap-3 rounded-sm border border-line bg-surface p-4 transition hover:border-lineH hover:bg-elev">
                            <span class="flex h-9 w-9 flex-none items-center justify-center rounded-full bg-brand-500/12 text-brand-read" aria-hidden="true">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor"><path d="M2 1.5v9l8-4.5z"/></svg>
                            </span>
                            <span class="min-w-0">
                                <span class="block truncate text-sm font-medium text-ink transition group-hover:text-brand-read">{{ $video->title }}</span>
                                <span class="mt-0.5 block font-mono text-2xs uppercase tracking-[0.1em] text-mute">{{ $video->category?->name ?? 'Video' }}</span>
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

{{-- ================================================================== CTA --}}
<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-brand-glow"></div>
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_at_center,#000_30%,transparent_75%)]"></div>
    <div class="relative mx-auto max-w-[1280px] px-5 py-24 text-center lg:px-10 lg:py-32">
        <div class="eyebrow reveal justify-center">Currently booking</div>
        <h2 class="reveal mx-auto mt-6 max-w-[16ch] font-display text-4xl leading-[1.02] tracking-tight text-ink sm:text-6xl lg:text-7xl" data-delay="1">
            Got something <span class="text-brand-500">real</span> to build?
        </h2>
        <p class="reveal mx-auto mt-8 max-w-[52ch] text-lg text-dim" data-delay="2">
            Twenty minutes over Zoom. If we're a fit, we go. If not, I'll tell you where to look next.
        </p>
        <div class="reveal mt-11 flex flex-col justify-center gap-3 sm:flex-row sm:flex-wrap" data-delay="3">
            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic group inline-flex items-center justify-center gap-3 rounded-sm bg-brand-500 px-7 py-4 font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400">
                <span>Book a 20-min intro</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="transition-transform group-hover:translate-x-0.5">
                    <path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="mailto:buildwithabdallah@gmail.com"
               class="inline-flex items-center justify-center gap-2 rounded-sm border border-line bg-surface px-6 py-4 text-ink transition hover:border-lineH hover:bg-elev">
                <span class="font-mono text-sm">buildwithabdallah@gmail.com</span>
            </a>
        </div>
    </div>
</section>

{{-- =========================================================== NEWSLETTER --}}
<section class="bg-bg">
    <div class="mx-auto grid max-w-[1280px] grid-cols-1 items-end gap-10 px-5 py-20 lg:grid-cols-[1fr_minmax(0,540px)] lg:px-10">
        <div>
            <div class="eyebrow">The newsletter</div>
            <h2 class="mt-4 max-w-[22ch] font-display text-3xl text-ink sm:text-4xl">
                Field notes on AI, Laravel and the messy parts of shipping.
            </h2>
            <p class="mt-5 max-w-[52ch] text-dim">
                One short email, every other Sunday. Real builds, broken things, what I'd do
                differently. No fluff, no funnel.
            </p>
        </div>

        <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col gap-3">
            @csrf
            <input type="hidden" name="source" value="home">

            @if (session('newsletter_success'))
                <div class="mb-2 rounded-sm border border-live/40 bg-live/10 px-4 py-3 text-sm text-live">{{ session('newsletter_success') }}</div>
            @endif

            <label for="newsletter-email" class="sr-only">Email address</label>
            <div class="flex flex-col gap-2 sm:flex-row">
                <div class="flex h-13 flex-1 items-center gap-2 rounded-sm border border-line bg-surface px-4 transition focus-within:border-brand-500">
                    <span aria-hidden="true" class="font-mono text-mute">&rsaquo;</span>
                    <input id="newsletter-email" type="email" name="email" value="{{ old('email') }}" required
                           placeholder="you@company.com"
                           class="min-w-0 flex-1 bg-transparent py-3.5 text-sm text-ink outline-none placeholder:text-faint">
                </div>
                <button type="submit" class="h-13 flex-none rounded-sm bg-ink px-6 py-3.5 text-sm font-semibold text-bg transition hover:bg-ink2">
                    Subscribe &rarr;
                </button>
            </div>

            @error('email') <p class="text-sm text-crit">{{ $message }}</p> @enderror

            <p class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">Free &middot; unsubscribe in one click</p>
        </form>
    </div>
</section>

@endsection
