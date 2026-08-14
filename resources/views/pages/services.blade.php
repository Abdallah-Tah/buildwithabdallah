@extends('layouts.app', ['title' => 'Services — Build With Abdallah'])

@section('content')
{{-- Hero --}}
<section class="relative overflow-hidden border-b border-line/70">
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_70%_60%_at_50%_30%,#000_40%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 pt-20 pb-24">
        <nav class="reveal flex items-center gap-2 text-[0.6875rem] font-mono uppercase tracking-[0.14em] text-mute mb-8">
            <a href="{{ route('home') }}" class="hover:text-ink2 transition">Home</a>
            <span>/</span>
            <span class="text-ink2">Services</span>
        </nav>

        <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div>
                <div class="eyebrow">Services</div>
                <h1 class="mt-4 font-display text-5xl lg:text-6xl text-ink max-w-[800px]">
                    Services for businesses that need<br/>
                    <span class="text-brand-500 italic">clearer systems</span> and less manual work.
                </h1>
            </div>
            <p class="text-dim max-w-md text-base" data-delay="1">
                Fixed-scope delivery when possible, honest quotes when discovery is needed, and practical implementation over buzzwords.
            </p>
        </div>
    </div>
</section>

{{-- Main Services Grid --}}
<section class="border-b border-line/70">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-28">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-line/60 rounded-md overflow-hidden border border-line/70 reveal">
            {{-- Featured: AI Agents --}}
            <article class="relative gradient-border bg-surface p-7 lg:p-9 md:row-span-2 group">
                <div class="relative z-10 h-full flex flex-col">
                    <div class="flex items-center justify-between">
                        <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-brand-500">★ Most requested</span>
                        <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">02 / 04</span>
                    </div>
                    <h2 class="mt-7 font-display text-4xl text-ink leading-[1.05] max-w-[420px]">
                        AI agents &amp;<br/>
                        <span class="text-brand-500">automation</span>
                    </h2>
                    <p class="mt-5 text-dim text-base max-w-[460px] leading-relaxed">
                        Useful AI — RAG over your docs, scheduled agents that do actual work,
                        Telegram & WhatsApp bots, scrapers, n8n / Make / custom pipelines.
                        Wired into your existing stack without breaking it.
                    </p>

                    <div class="mt-7 rounded-sm border border-line bg-bg/60 overflow-hidden">
                        <div class="flex items-center justify-between px-3 h-7 border-b border-line">
                            <span class="font-mono text-[0.6875rem] text-mute">agents/lead_qualifier.py</span>
                            <span class="font-mono text-[0.6875rem] text-live">● running</span>
                        </div>
                        <pre class="m-0 px-4 py-3 font-mono text-[12px] leading-relaxed text-ink2 whitespace-pre"><span class="tok-com"># every 5min: triage new contacts</span>
<span class="tok-kw">async def</span> <span class="tok-fn">qualify</span><span class="tok-pun">(</span><span class="tok-var">lead</span><span class="tok-pun">):</span>
    <span class="tok-var">score</span> <span class="tok-pun">=</span> <span class="tok-kw">await</span> claude<span class="tok-pun">.</span><span class="tok-fn">rank</span><span class="tok-pun">(</span><span class="tok-var">lead</span><span class="tok-pun">.</span>message<span class="tok-pun">)</span>
    <span class="tok-kw">if</span> <span class="tok-var">score</span> <span class="tok-pun">&gt;</span> <span class="tok-num">0.8</span><span class="tok-pun">:</span>
        <span class="tok-kw">await</span> tg<span class="tok-pun">.</span><span class="tok-fn">notify</span><span class="tok-pun">(</span><span class="tok-str">"hot lead"</span><span class="tok-pun">,</span> <span class="tok-var">lead</span><span class="tok-pun">)</span></pre>
                    </div>

                    <div class="mt-auto pt-8 flex flex-wrap gap-1.5">
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">OpenAI</span>
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Claude</span>
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Ollama</span>
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">Telegram</span>
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] border border-line bg-bg/40 text-ink2 px-2 py-1 rounded-xs">n8n</span>
                    </div>
                </div>
            </article>

            {{-- Custom Software --}}
            <article class="bg-surface p-7 lg:p-9 hover:bg-elev/70 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">01 / 04</span>
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">— from $8k</span>
                </div>
                <h2 class="mt-6 font-display text-3xl text-ink">Custom software</h2>
                <p class="mt-3 text-dim text-base max-w-[460px]">Multi-tenant SaaS, dashboards, internal tools, MVPs. Laravel + Livewire / Inertia or Next.js — whichever fits the team.</p>
                <ul class="mt-5 space-y-2 text-sm text-ink2">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Auth, billing, multi-tenancy from day one</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Real CI/CD, real backups, real monitoring</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Handover docs & Loom walkthroughs</li>
                </ul>
            </article>

            {{-- Content & Lead-gen --}}
            <article class="bg-surface p-7 lg:p-9 hover:bg-elev/70 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">03 / 04</span>
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">— recurring</span>
                </div>
                <h2 class="mt-6 font-display text-3xl text-ink">Content & lead-gen</h2>
                <p class="mt-3 text-dim text-base max-w-[460px]">Technical tutorials, video walkthroughs, newsletter ops, SEO that actually ranks.</p>
                <ul class="mt-5 space-y-2 text-sm text-ink2">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Editorial calendar & publishing pipeline</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Tutorial videos with chapter timestamps</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Newsletter funnel + CRM</li>
                </ul>
            </article>

            {{-- Office Hours --}}
            <article class="bg-surface p-7 lg:p-9 hover:bg-elev/70 transition group">
                <div class="flex items-center justify-between">
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">04 / 04</span>
                    <span class="text-[0.6875rem] font-mono uppercase tracking-[0.22em] text-mute">— $250 / 60min</span>
                </div>
                <h2 class="mt-6 font-display text-3xl text-ink">Office hours</h2>
                <p class="mt-3 text-dim text-base max-w-[460px]">A single 60-min Zoom. Architecture review, code-roast, hiring help, AI strategy.</p>
                <ul class="mt-5 space-y-2 text-sm text-ink2">
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> No NDA needed for first call</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Recording + notes within 24h</li>
                    <li class="flex gap-3"><span class="text-brand-500 font-mono text-xs">→</span> Refund if it wasn't useful</li>
                </ul>
            </article>
        </div>
    </div>
</section>

{{-- Details Section --}}
<section class="border-b border-line/70 bg-surface/30">
    <div class="mx-auto max-w-[1280px] px-6 lg:px-10 py-28">
        <div class="reveal grid grid-cols-1 md:grid-cols-3 gap-6">
            <article class="rounded-lg border border-line bg-bg/40 p-7">
                <div class="eyebrow mb-4">Ideal for</div>
                <h3 class="font-display text-2xl text-ink">Who this is for</h3>
                <p class="mt-4 text-dim leading-relaxed">Small businesses, solo founders, local services, and teams that need a working system without hiring a full dev team.</p>
            </article>

            <article class="rounded-lg border border-line bg-bg/40 p-7">
                <div class="eyebrow mb-4">Delivery</div>
                <h3 class="font-display text-2xl text-ink">How I deliver</h3>
                <p class="mt-4 text-dim leading-relaxed">Clear scope, clean implementation, professional UI, deployment help, and documentation you can understand.</p>
            </article>

            <article class="rounded-lg border border-line bg-bg/40 p-7">
                <div class="eyebrow mb-4">Focus</div>
                <h3 class="font-display text-2xl text-ink">What matters</h3>
                <p class="mt-4 text-dim leading-relaxed">Saving time, reducing mistakes, improving follow-up, and making the business easier to operate.</p>
            </article>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-brand-glow pointer-events-none"></div>
    <div class="absolute inset-0 bg-grid-dark bg-grid pointer-events-none [mask-image:radial-gradient(ellipse_at_center,#000_30%,transparent_75%)]"></div>
    <div class="relative mx-auto max-w-[1280px] px-6 lg:px-10 py-28 text-center">
        <h2 class="reveal font-display text-5xl text-ink">Ready to start?</h2>
        <p class="reveal mt-6 text-dim text-lg max-w-[500px] mx-auto" data-delay="1">
            Let's talk about what you need built. Twenty minutes, no commitment.
        </p>
        <div class="reveal mt-10" data-delay="2">
            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic inline-flex items-center gap-3 bg-brand-500 hover:bg-brand-400 text-brand-ink font-medium px-7 py-4 rounded-sm shadow-glow transition">
                <span>Book a call</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M1 8h13M9 3l5 5-5 5" stroke="currentColor" stroke-width="1.5"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection
