@extends('layouts.app', [
    'title' => 'Build With Abdallah — Ship faster with custom software, AI agents & automation',
    'metaDescription' => 'Custom Laravel apps, AI agents, Telegram bots, workflow automation and dashboards — built by a senior full-stack engineer with 8+ years in production.',
])

@section('content')
{{-- ============================================================ HERO --}}
<section class="relative overflow-hidden border-b border-line/70">
    {{-- Grid + Aurora backdrop --}}
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 pt-20 pb-28">
        {{-- Eyebrow --}}
        <div class="reveal flex items-center gap-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">
            <span class="inline-flex items-center gap-2 px-2 py-1 rounded-xs border border-line bg-surface/60">
                <span class="w-1.5 h-1.5 rounded-full bg-live"></span>
                <span class="text-ink2">Booking Q3 2026</span>
            </span>
            <span>// senior full-stack · solo studio</span>
        </div>

        {{-- Headline --}}
        <h1 class="reveal mt-7 font-display text-5xl sm:text-6xl lg:text-8xl text-ink max-w-[1100px]" data-delay="1">
            Ship faster<br />
            with <span class="relative inline-block">
                <span class="text-brand-500">custom software</span>
                <svg class="absolute -bottom-2 left-0 w-full" height="10" viewBox="0 0 280 10" fill="none" aria-hidden="true">
                    <path d="M2 7c40-6 80-6 120 0s80 6 156-2" stroke="#005cff" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </span>,<br />
            AI&nbsp;agents &amp; <span class="text-ink2">automation</span>.
        </h1>

        <div class="reveal mt-10 grid grid-cols-1 lg:grid-cols-[1fr_440px] gap-10 lg:gap-16 items-start" data-delay="2">
            <p class="text-lg text-dim max-w-[600px] leading-relaxed">
                I'm Abdallah — a senior engineer with eight years of production Laravel,
                Python and Vue. I build the things small teams can't afford to get wrong:
                internal tools, MVPs, AI features, Telegram bots, workflow plumbing.
                One direct line, no agency markup, no juniors to babysit.
            </p>
            <div class="mt-6 flex flex-wrap gap-2">
                @foreach($proofPoints as $proofPoint)
                    <span class="rounded-sm border border-line bg-surface/60 px-3 py-2 text-sm text-ink2">{{ $proofPoint }}</span>
                @endforeach
            </div>

            {{-- Code preview — GitHub-style block (chrome + highlight.js added by app.js) --}}
            <pre data-gh-code><code class="language-bash"># who is this for?
$ curl -s buildwith.abdallah/who | jq
{
  "founders":     "pre-PMF, need an MVP yesterday",
  "ops_leads":    "drowning in spreadsheets &amp; zaps",
  "agencies":     "need a senior to ship the hard bits",
  "in_house_eng": "want a second pair of senior eyes"
}</code></pre>
        </div>

        {{-- CTA row --}}
        <div class="reveal mt-12 flex flex-wrap items-center gap-3" data-delay="3">
            <a href="{{ route('contact.index') }}" data-magnetic data-magnetic-strength="0.25"
               class="magnetic group inline-flex items-center gap-3 bg-brand-500 hover:bg-brand-400 text-brand-ink font-medium px-6 py-3.5 rounded-sm shadow-glow transition">
                <span>Book a 20-min intro</span>
                <span class="font-mono text-[0.6875rem] uppercase tracking-[0.22em] opacity-70 group-hover:opacity-100">free</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="transition-transform group-hover:translate-x-0.5"><path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5"/></svg>
            </a>
            <a href="#work" class="inline-flex items-center gap-2 border border-line hover:border-lineH bg-surface/40 hover:bg-elev/60 text-ink px-5 py-3.5 rounded-sm transition">
                <span class="font-mono text-[0.6875rem] text-mute">▸</span>
                See current projects
            </a>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.22em] text-mute pl-2 hidden md:inline">
                — or <a href="mailto:buildwithabdallah@gmail.com" class="text-ink2 hover:text-ink ul-link">buildwithabdallah@gmail.com</a>
            </span>
        </div>

    </div>
</section>

{{-- ============================================================ STACK MARQUEE --}}
<section class="border-b border-line/70 py-6 overflow-hidden">
    <div class="relative">
        <div class="marquee text-mute font-mono text-sm uppercase tracking-[0.14em] whitespace-nowrap">
            <div class="flex items-center gap-10 px-5">
                <span>▸ Laravel 11</span><span class="text-faint">/</span>
                <span>▸ Livewire</span><span class="text-faint">/</span>
                <span>▸ Vue 3 · Inertia</span><span class="text-faint">/</span>
                <span>▸ Next.js</span><span class="text-faint">/</span>
                <span>▸ Python · FastAPI</span><span class="text-faint">/</span>
                <span>▸ PostgreSQL · Redis</span><span class="text-faint">/</span>
                <span>▸ OpenAI · Claude · Ollama</span><span class="text-faint">/</span>
                <span>▸ React Native</span><span class="text-faint">/</span>
                <span>▸ Tailwind</span><span class="text-faint">/</span>
                <span>▸ AWS · Hetzner</span><span class="text-faint">/</span>
                <span>▸ Stripe</span><span class="text-faint">/</span>
                <span>▸ Telegram Bot API</span><span class="text-faint">/</span>
            </div>
            <div class="flex items-center gap-10 px-5" aria-hidden="true">
                <span>▸ Laravel 11</span><span class="text-faint">/</span>
                <span>▸ Livewire</span><span class="text-faint">/</span>
                <span>▸ Vue 3 · Inertia</span><span class="text-faint">/</span>
                <span>▸ Next.js</span><span class="text-faint">/</span>
                <span>▸ Python · FastAPI</span><span class="text-faint">/</span>
                <span>▸ PostgreSQL · Redis</span><span class="text-faint">/</span>
                <span>▸ OpenAI · Claude · Ollama</span><span class="text-faint">/</span>
                <span>▸ React Native</span><span class="text-faint">/</span>
                <span>▸ Tailwind</span><span class="text-faint">/</span>
                <span>▸ AWS · Hetzner</span><span class="text-faint">/</span>
                <span>▸ Stripe</span><span class="text-faint">/</span>
                <span>▸ Telegram Bot API</span><span class="text-faint">/</span>
            </div>
        </div>
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-bg to-transparent pointer-events-none"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-bg to-transparent pointer-events-none"></div>
    </div>
</section>

{{-- =============================================================== SERVICES --}}
<section id="services" class="relative border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-28">
        <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-14">
            <div>
                <div class="eyebrow">Services</div>
                <h2 class="mt-4 font-display text-5xl lg:text-6xl text-ink max-w-[800px]">
                    Four ways to put<br/>
                    <span class="text-brand-500 italic">a senior engineer</span> on it.
                </h2>
            </div>
            <p class="text-dim max-w-md text-base">
                Fixed-scope sprints for defined deliverables, retainers for ongoing work, agentic AI work for the moment, and office hours for everything in between.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-line/60 rounded-md overflow-hidden border border-line/70 reveal">
            {{-- Featured card: AI/automation --}}
            <article class="relative gradient-border bg-surface p-7 lg:p-9 md:row-span-2 group">
                <div class="relative z-10 h-full flex flex-col">
                    <div class="flex items-center justify-between">
                        <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-500">★ Most requested</span>
                        <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">02 / 04</span>
                    </div>
                    <h3 class="mt-7 font-display text-4xl text-ink leading-[1.05] max-w-[420px]">
                        AI agents &amp;<br/>
                        <span class="text-brand-500">automation</span>
                    </h3>
                    <p class="mt-5 text-dim text-base max-w-[460px] leading-relaxed">
                        Useful AI — RAG over your docs, scheduled agents that do actual work,
                        Telegram & WhatsApp bots, scrapers, n8n / Make / custom pipelines.
                        Wired into your existing stack without breaking it.
                    </p>

                    {{-- Code preview — GitHub-style block (chrome + highlight.js added by app.js) --}}
                    <pre data-gh-code class="mt-7"><code class="language-python"># every 5min: triage new contacts
async def qualify(lead):
    score = await claude.rank(lead.message)
    if score &gt; 0.8:  # ping me on Telegram
        await tg.notify("hot lead", lead)</code></pre>

                    <div class="mt-auto pt-8 flex items-center justify-between">
                        <div class="flex flex-wrap gap-1.5">
                            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">OpenAI</span>
                            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Claude</span>
                            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Ollama</span>
                            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Telegram</span>
                        </div>
                        <a href="{{ route('services') }}" class="text-sm text-brand-400 hover:text-brand-300 font-mono inline-flex items-center gap-1.5">
                            Learn more <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </article>

            {{-- Card 01: software --}}
            <article class="bg-surface p-7 lg:p-9 hover:bg-elev/70 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">01 / 04</span>
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">— from $8k</span>
                </div>
                <h3 class="mt-6 font-display text-3xl text-ink">Custom software</h3>
                <p class="mt-3 text-dim text-base max-w-[460px]">Multi-tenant SaaS, dashboards, internal tools, MVPs. Laravel + Livewire / Inertia or Next.js — whichever fits the team.</p>
                <ul class="mt-5 space-y-2 text-sm text-ink2">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Auth, billing, multi-tenancy from day one</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Real CI/CD, real backups, real monitoring</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Handover docs & Loom walkthroughs</li>
                </ul>
            </article>

            {{-- Card 03: content / lead-gen --}}
            <article class="bg-surface p-7 lg:p-9 hover:bg-elev/70 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">03 / 04</span>
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">— recurring</span>
                </div>
                <h3 class="mt-6 font-display text-3xl text-ink">Content & lead-gen</h3>
                <p class="mt-3 text-dim text-base max-w-[460px]">Technical tutorials, video walkthroughs, newsletter ops, SEO that actually ranks. The exact playbook used to grow this site.</p>
                <ul class="mt-5 space-y-2 text-sm text-ink2">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Editorial calendar & publishing pipeline</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Tutorial videos with chapter timestamps</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Newsletter funnel + CRM</li>
                </ul>
            </article>

            {{-- Card 04: office hours --}}
            <article class="bg-surface p-7 lg:p-9 hover:bg-elev/70 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">04 / 04</span>
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">— $250 / 60min</span>
                </div>
                <h3 class="mt-6 font-display text-3xl text-ink">Office hours</h3>
                <p class="mt-3 text-dim text-base max-w-[460px]">A single 60-min Zoom. Architecture review, code-roast, hiring help, AI strategy. Often the cheapest decision you'll make this quarter.</p>
                <ul class="mt-5 space-y-2 text-sm text-ink2">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> No NDA needed for first call</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Recording + notes within 24h</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Refund if it wasn't useful</li>
                </ul>
            </article>
        </div>
    </div>
</section>

{{-- =================================================================== WORK --}}
<section id="work" class="border-b border-line/70 relative">
    <div class="absolute inset-0 bg-grid-dark bg-grid-sm opacity-40 pointer-events-none [mask-image:radial-gradient(ellipse_at_top,#000,transparent_70%)]"></div>
    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-28">
        <div class="reveal flex items-end justify-between mb-14">
            <div>
                <div class="eyebrow">Current projects</div>
                <h2 class="mt-4 font-display text-5xl lg:text-6xl text-ink">What I am <span class="italic text-brand-500">building</span> now.</h2>
            </div>
            <a href="{{ route('contact.index') }}" class="hidden md:inline-flex font-mono text-xs uppercase tracking-[0.22em] text-mute hover:text-ink2 pb-2 ul-link">Discuss your project →</a>
        </div>

        {{-- Active projects --}}
        <article class="reveal rounded-lg border border-line bg-surface overflow-hidden mb-6 grid grid-cols-1 lg:grid-cols-[1.1fr_1fr]">
            <div class="relative aspect-[4/3] lg:aspect-auto overflow-hidden bg-bg">
                <img src="https://buildwithabdallah.com/storage/covers/01KXXD1NG9X4YDDVRGCH9SKGV1.png" alt="Kirada rental management application" class="absolute inset-0 h-full w-full object-cover" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-bg/80 via-transparent to-transparent"></div>
                <span class="absolute top-4 left-4 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-500">★ Featured</span>
            </div>

            <div class="p-8 lg:p-10 flex flex-col">
                <div class="flex items-center gap-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">
                    <span>SaaS · rental management</span>
                    <span class="w-1 h-1 rounded-full bg-brand-500"></span>
                    <span>In development</span>
                </div>
                <h3 class="mt-4 font-display text-4xl text-ink">Kirada</h3>
                <p class="mt-4 text-dim leading-relaxed">
                    A connected operating system for rental teams. Kirada brings properties, units, tenants, leases, invoices, payment proofs, maintenance, documents, and messaging into one workflow.
                </p>
                <div class="mt-6 grid grid-cols-3 gap-px bg-line/60 rounded-sm overflow-hidden border border-line/70">
                    <div class="bg-bg/40 p-3.5"><div class="text-2xl text-ink font-display">01</div><div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mt-1">properties</div></div>
                    <div class="bg-bg/40 p-3.5"><div class="text-2xl text-ink font-display">02</div><div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mt-1">leases</div></div>
                    <div class="bg-bg/40 p-3.5"><div class="text-2xl text-ink font-display">03</div><div class="text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mt-1">payments</div></div>
                </div>
                <div class="mt-5 flex flex-wrap gap-1.5">
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Rental operations</span>
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Lease workflows</span>
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Payments</span>
                </div>
                <a href="https://kirada.buildwithabdallah.com" target="_blank" rel="noopener noreferrer" class="mt-auto pt-7 inline-flex items-center gap-2 text-brand-400 hover:text-brand-300 ul-link self-start">
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em]">Visit Kirada</span>
                    <span aria-hidden="true">→</span>
                </a>
            </div>
        </article>

        <article class="reveal rounded-lg border border-line bg-surface overflow-hidden grid grid-cols-1 lg:grid-cols-[1.1fr_1fr]" data-delay="1">
            <div class="relative aspect-[4/3] lg:aspect-auto bg-bg overflow-hidden p-8 lg:p-10">
                <div class="absolute inset-0 bg-grid-dark bg-grid-sm opacity-40 [mask-image:radial-gradient(ellipse_at_center,#000,transparent_70%)]"></div>
                <div class="relative h-full min-h-[260px] border border-line bg-surface/80 p-4 shadow-pop">
                    <div class="flex items-center gap-1.5 border-b border-line pb-3">
                        <span class="w-2 h-2 rounded-full bg-line"></span><span class="w-2 h-2 rounded-full bg-line"></span><span class="w-2 h-2 rounded-full bg-line"></span>
                        <span class="ml-3 font-mono text-[0.6875rem] text-mute">adstudio.buildwithabdallah.com</span>
                    </div>
                    <div class="mt-5 grid grid-cols-3 gap-3">
                        <div class="aspect-[3/4] border border-line bg-bg/70"></div>
                        <div class="aspect-[3/4] border border-brand-500/50 bg-brand-500/10"></div>
                        <div class="aspect-[3/4] border border-line bg-bg/70"></div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-mute"><span>Product assets</span><span class="text-brand-400">Review ready</span></div>
                </div>
            </div>
            <div class="p-8 lg:p-10 flex flex-col">
                <div class="flex items-center gap-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute"><span>AI · creative automation</span><span class="w-1 h-1 rounded-full bg-brand-500"></span><span>In development</span></div>
                <h3 class="mt-4 font-display text-4xl text-ink">AI Ad Studio</h3>
                <p class="mt-4 text-dim leading-relaxed">A controlled workflow for turning real product photos into platform-ready video ads. The work connects media processing, generation jobs, review states, and delivery so teams can create variations without losing the approved product asset.</p>
                <div class="mt-5 flex flex-wrap gap-1.5">
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Python</span>
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">FastAPI</span>
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Celery</span>
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">AI media</span>
                </div>
                <a href="https://adstudio.buildwithabdallah.com" target="_blank" rel="noopener noreferrer" class="mt-auto pt-7 inline-flex items-center gap-2 text-brand-400 hover:text-brand-300 ul-link self-start"><span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em]">Visit AI Ad Studio</span><span aria-hidden="true">→</span></a>
            </div>
        </article>
    </div>
</section>

{{-- ============================================================== JOURNAL --}}
<section id="journal" class="border-b border-line/70 bg-surface/30">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-28">
        <div class="reveal flex items-end justify-between mb-12">
            <div>
                <div class="eyebrow">Journal</div>
                <h2 class="mt-4 font-display text-5xl text-ink">Tutorials & field notes.</h2>
            </div>
            <a href="{{ route('tutorials.index') }}" class="font-mono text-xs uppercase tracking-[0.22em] text-mute hover:text-ink2 ul-link pb-2">All posts →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($latestTutorials as $index => $post)
                <article class="reveal group rounded-lg border border-line hover:border-lineH bg-bg/40 overflow-hidden transition" @if($index > 0) data-delay="{{ $index }}" @endif>
                    <x-post-cover :post="$post">
                        <span class="absolute top-3 left-3 text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-400 bg-bg/80 border border-line/60 px-2 py-1 rounded-xs">▸ Tutorial</span>
                    </x-post-cover>
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
                <div class="col-span-3 rounded-lg border border-dashed border-line bg-surface/40 p-12 text-center">
                    <div class="eyebrow justify-center mb-4">Coming soon</div>
                    <h3 class="font-display text-2xl text-ink">Tutorials are on the way</h3>
                    <p class="mt-3 text-dim max-w-md mx-auto">Practical Laravel, automation, and AI tutorials will appear here once the first articles are published.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- =================================================================== CTA --}}
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-brand-glow pointer-events-none"></div>
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_at_center,#000_30%,transparent_75%)]"></div>
    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-32 text-center">
        <div class="eyebrow reveal justify-center">Q3 — Q4 2026 booking</div>
        <h2 class="reveal mt-6 font-display text-5xl sm:text-7xl lg:text-8xl text-ink max-w-[1100px] mx-auto leading-[0.95]" data-delay="1">
            Got something <span class="italic text-brand-500">real</span><br/>
            to build?
        </h2>
        <p class="reveal mt-8 text-dim text-lg max-w-[560px] mx-auto" data-delay="2">
            Twenty minutes over Zoom. If we're a fit, we go. If not, I'll tell you where to look next.
        </p>
        <div class="reveal mt-12 flex flex-wrap gap-3 justify-center" data-delay="3">
            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic group inline-flex items-center gap-3 bg-brand-500 hover:bg-brand-400 text-brand-ink font-medium px-7 py-4 rounded-sm shadow-glow transition">
                <span>Book a 20-min intro</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="transition-transform group-hover:translate-x-0.5"><path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5"/></svg>
            </a>
            <a href="mailto:buildwithabdallah@gmail.com" class="inline-flex items-center gap-2 border border-line hover:border-lineH bg-surface/60 text-ink px-6 py-4 rounded-sm transition">
                <span class="font-mono text-sm">buildwithabdallah@gmail.com</span>
            </a>
        </div>
    </div>
</section>

{{-- ============================================================= NEWSLETTER --}}
<section class="border-b border-line/70 bg-bg">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-20 grid grid-cols-1 lg:grid-cols-[1fr_540px] gap-10 items-end">
        <div>
            <div class="eyebrow">The newsletter</div>
            <h2 class="mt-4 font-display text-4xl text-ink max-w-[600px]">Field notes on AI, Laravel and the messy parts of shipping.</h2>
            <p class="mt-5 text-dim max-w-[520px]">One short email, every other Sunday. Real builds, broken things, what I'd do differently. 2,400+ engineers reading. No fluff, no funnel.</p>
        </div>
        <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col gap-3" x-data="{ email: '' }">
            @csrf
            <input type="hidden" name="source" value="home">
            @if(session('newsletter_success'))
                <div class="mb-2 rounded-sm border border-live/40 bg-live/10 px-4 py-3 text-sm text-live">{{ session('newsletter_success') }}</div>
            @endif
            <div class="flex gap-2">
                <div class="flex-1 flex items-center gap-2 px-4 h-12 rounded-sm border border-line bg-surface focus-within:border-brand-500 transition">
                    <span class="font-mono text-mute">▸</span>
                    <input type="email" name="email" x-model="email" value="{{ old('email') }}" placeholder="you@company.com" class="flex-1 bg-transparent outline-none placeholder-faint text-ink text-sm" required />
                </div>
                <button type="submit" class="h-12 px-5 rounded-sm bg-ink text-bg font-medium text-sm hover:bg-ink2 transition">
                    Subscribe →
                </button>
            </div>
            @error('email') <p class="text-sm text-crit">{{ $message }}</p> @enderror
            <div class="flex items-center justify-between text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute">
                <span>▸ free · unsubscribe in one click</span>
                <span>2,412 subscribed</span>
            </div>
        </form>
    </div>
</section>
@endsection
