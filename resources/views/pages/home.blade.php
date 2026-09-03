@extends('layouts.app', [
    'title' => 'Build With Abdallah | Software Development & IT Consulting',
    'metaDescription' => 'Maine software consultancy building and integrating custom, industrial and manufacturing systems across equipment, legacy applications, SQL Server, APIs, automation and modern user experiences.',
])

@section('content')

{{-- Hero --}}
<section class="relative flex min-h-[calc(90svh-4.75rem)] overflow-hidden border-b border-line" data-hero-scene>
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid opacity-70 [mask-image:linear-gradient(to_bottom,#000_0%,#000_45%,transparent_95%)]"></div>
    <div class="aurora"></div>
    <div class="relative mx-auto flex w-full max-w-[1600px] items-center px-5 py-14 sm:py-16 lg:px-8 lg:py-16 xl:px-10">
        <div class="grid w-full items-center gap-12 xl:grid-cols-[minmax(0,0.86fr)_minmax(620px,1.14fr)] xl:gap-9">
            <div>
                <div class="eyebrow reveal">Software Development &middot; IT Consulting &middot; Maine</div>
                <h1 class="hero-title mt-6 font-display text-[clamp(2.5rem,4.5vw,4.5rem)] font-semibold leading-[0.96] tracking-[-0.045em] text-ink">
                    <span class="hero-title__line"><span>Software built for</span></span>
                    <span class="hero-title__line"><span>organizations that</span></span>
                    <span class="hero-title__line text-brand-500"><span>need systems to work.</span></span>
                </h1>
                <div class="reveal mt-7 max-w-[650px] text-[1.0625rem] leading-7 text-dim" data-delay="2">
                    <p>Build With Abdallah delivers custom applications, legacy modernization, system integrations, automation and long-term technical support around real operational requirements.</p>
                </div>
                <div class="reveal mt-8 flex flex-col gap-3 sm:flex-row sm:items-center" data-delay="3">
                    <a href="{{ route('contact.index') }}" data-magnetic data-magnetic-strength="0.2"
                       class="magnetic group inline-flex min-h-12 items-center justify-center gap-3 rounded-sm bg-brand-500 px-6 py-3 font-semibold text-brand-ink shadow-glow-sm transition hover:bg-brand-400">
                        Discuss a Project
                        <span aria-hidden="true" class="transition-transform group-hover:translate-x-0.5">&rarr;</span>
                    </a>
                    <a href="#services" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-lineH bg-surface px-6 py-3 font-semibold text-ink transition hover:bg-elev">
                        View Capabilities
                    </a>
                </div>
                <ul class="reveal trust-sequence mt-9 grid grid-cols-2 gap-x-5 gap-y-3 border-t border-line pt-6 sm:grid-cols-3" data-delay="4" aria-label="Company credentials">
                    @foreach ($proofPoints as $proofPoint)
                        <li class="flex min-h-8 items-center gap-2 text-sm font-medium text-ink2">
                            <span class="flex h-5 w-5 flex-none items-center justify-center rounded-full bg-brand-500/10 text-brand-read" aria-hidden="true">
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="m2.5 6.2 2.1 2.1 4.9-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            <span>{{ $proofPoint }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal mx-auto w-full max-w-[760px] xl:max-w-none" data-delay="2" data-parallax="0.08">
                <x-system-map />
            </div>
        </div>
    </div>
</section>

{{-- What we solve --}}
<section class="border-b border-line bg-navy-900 text-white" data-problem-scene>
    <div class="mx-auto grid max-w-[1400px] gap-12 px-5 py-24 sm:py-28 lg:grid-cols-[1.05fr_0.95fr] lg:gap-20 lg:px-8 lg:py-36 xl:px-10">
        <div class="lg:sticky lg:top-28 lg:self-start">
            <div class="reveal font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-300">What we solve</div>
            <h2 class="reveal mt-6 max-w-[15ch] font-display text-[clamp(2.75rem,5vw,5.5rem)] font-semibold leading-[.98] tracking-[-0.04em]" data-delay="1">
                Organizations rarely need <span class="text-brand-300">&ldquo;more software.&rdquo;</span>
            </h2>
            <p class="reveal mt-7 max-w-[590px] text-xl leading-8 text-white/65" data-delay="2">They need existing systems to work better together.</p>
        </div>
        <div class="space-y-2" aria-label="Common operational problems">
            @foreach (['Legacy applications and desktop software', 'Manual workflows and undocumented rules', 'Disconnected databases and slow reporting', 'Shop-floor systems isolated from business applications', 'Serial equipment trapped on individual workstations', 'Quality data requiring manual entry', 'Production systems that cannot communicate'] as $index => $problem)
                <div class="problem-line reveal flex min-h-24 items-center gap-5 border-b border-white/15 py-5" data-delay="{{ min($index, 6) }}">
                    <span class="font-mono text-xs text-brand-300/70">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="font-display text-2xl font-semibold text-white/75 sm:text-3xl">{{ $problem }}</span>
                </div>
            @endforeach
            <div class="reveal pt-10 text-right" data-delay="3">
                <p class="font-display text-3xl font-semibold text-white sm:text-4xl">Modern software should connect what already works.</p>
                <span class="mt-4 inline-block h-px w-24 bg-brand-300"></span>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<section id="services" class="border-b border-line bg-bg">
    <div class="mx-auto max-w-[1400px] px-5 py-20 sm:py-24 lg:px-8 lg:py-28 xl:px-10">
        <div class="reveal flex items-center gap-3">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-read">Services</span>
            <span class="h-px flex-1 bg-gradient-to-r from-lineH to-transparent"></span>
            <span class="font-mono text-[0.6875rem] text-mute">01 / 06</span>
        </div>
        <div class="reveal mt-8 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between" data-delay="1">
            <h2 class="max-w-[15ch] font-display text-4xl font-semibold leading-[1.02] tracking-[-0.03em] text-ink sm:text-5xl lg:text-6xl">
                Software capabilities for <span class="text-brand-500">operational needs.</span>
            </h2>
            <p class="max-w-[470px] text-[1.0625rem] leading-7 text-dim">From discovery and architecture through implementation, deployment, documentation and long-term application support.</p>
        </div>
        <div class="mt-14 grid gap-5 lg:grid-cols-2">
            @foreach ([
                ['software', 'Custom Software Development', 'Build secure internal systems, business applications, portals, SaaS platforms and operational tools.'],
                ['modernize', 'Legacy Modernization', 'Modernize aging applications and workflows without unnecessarily replacing everything at once.'],
                ['integration', 'Systems & API Integration', 'Connect REST and SOAP services, databases, files, third-party services and existing organizational systems.'],
                ['data', 'Manufacturing & Industrial Software', 'Connect production systems, quality platforms, databases, equipment and modern applications.'],
                ['automation', 'Data & Automation', 'Transform operational data and reduce repetitive work through scheduled, monitored automation.'],
                ['support', 'Production Application Support', 'Investigate application, database, integration and deployment failures—then implement durable fixes.'],
            ] as $index => [$icon, $title, $copy])
                <article @class([
                    'reveal capability-panel group relative min-h-[420px] overflow-hidden rounded-xl border border-line p-7 sm:p-9 lg:p-10',
                    'bg-surface' => $index % 3 !== 1,
                    'bg-panel' => $index % 3 === 1,
                ]) data-delay="{{ min($index, 6) }}">
                    <span class="pointer-events-none absolute -right-2 -top-8 select-none font-display text-[8rem] font-semibold leading-none text-ink/[0.025] sm:text-[11rem]">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="relative flex h-full flex-col">
                        <div class="flex items-center gap-4">
                            <x-capability-icon :name="$icon" />
                            <span class="h-px flex-1 bg-line"></span>
                            <span class="font-mono text-xs text-mute">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <h3 class="mt-14 max-w-[13ch] font-display text-3xl font-semibold leading-[1.05] tracking-[-0.025em] text-ink sm:text-4xl">{{ $title }}</h3>
                        <p class="mt-5 max-w-[54ch] text-[1.0625rem] leading-7 text-dim">{{ $copy }}</p>
                        <div class="mt-auto flex flex-wrap items-end justify-between gap-5 pt-10">
                            <span class="text-xs font-semibold uppercase tracking-[0.08em] text-mute">
                                {{ [
                                    'Laravel · PHP · Python · React',
                                    'Incremental replacement · Security · APIs',
                                    'REST · SOAP · XML · SQL Server',
                                    'InfinityQS ProFicient · RS-232 · SQL Server',
                                    'Workers · Scheduling · Data processing',
                                    'Root cause · Observability · Documentation',
                                ][$index] }}
                            </span>
                            <a href="{{ $index === 3 ? route('manufacturing') : route('services') }}" class="group/link inline-flex items-center gap-2 text-sm font-semibold text-brand-read">{{ $index === 3 ? 'Explore Manufacturing' : 'Service details' }} <span class="transition-transform group-hover/link:translate-x-1" aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- How we work --}}
<section class="border-b border-line bg-surface">
    <div class="mx-auto max-w-[1400px] px-5 py-20 sm:py-24 lg:px-8 lg:py-28 xl:px-10">
        <div class="reveal flex items-center gap-3">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-read">How we work</span>
            <span class="h-px flex-1 bg-gradient-to-r from-lineH to-transparent"></span>
            <span class="font-mono text-[0.6875rem] text-mute">02 / 06</span>
        </div>
        <div class="mt-10 grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:gap-20">
            <div class="reveal lg:sticky lg:top-28 lg:self-start" data-delay="1">
                <h2 class="max-w-[13ch] font-display text-4xl font-semibold leading-[1.02] tracking-[-0.03em] text-ink sm:text-5xl lg:text-6xl">From operational problem to maintainable software.</h2>
                <p class="mt-6 max-w-md text-[1.0625rem] leading-7 text-dim">A direct delivery path with clear technical decisions, visible progress and continued ownership after launch.</p>
            </div>
            <ol class="process-timeline relative" data-process-timeline>
                <span class="process-timeline__rail" aria-hidden="true"><span data-process-progress></span></span>
            @foreach ([
                ['Discover', 'Understand workflows, users, constraints and existing systems.'],
                ['Design', 'Define architecture, data, integrations and security.'],
                ['Build & Deploy', 'Develop, test, document and release.'],
                ['Support', 'Maintain and improve after launch.'],
            ] as $index => [$title, $copy])
                <li class="process-stage relative pl-16 pb-16 last:pb-0 sm:pl-20 sm:pb-24" data-process-stage>
                    <span class="process-stage__marker">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="border-b border-line pb-12">
                        <div class="font-mono text-[0.6875rem] uppercase tracking-[0.16em] text-brand-read">Stage {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</div>
                        <h3 class="mt-4 font-display text-3xl font-semibold tracking-[-0.025em] text-ink sm:text-4xl">{{ $title }}</h3>
                        <p class="mt-4 max-w-[620px] text-[1.0625rem] leading-7 text-dim">{{ $copy }}</p>
                    </div>
                </li>
            @endforeach
            </ol>
        </div>
    </div>
</section>

{{-- Selected work --}}
<section id="work" class="border-b border-line bg-bg">
    <div class="mx-auto max-w-[1400px] px-5 py-20 sm:py-24 lg:px-8 lg:py-28 xl:px-10">
        <div class="reveal flex items-center gap-3">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-read">Selected work</span>
            <span class="h-px flex-1 bg-gradient-to-r from-lineH to-transparent"></span>
            <span class="font-mono text-[0.6875rem] text-mute">03 / 06</span>
        </div>
        <div class="reveal mt-8" data-delay="1">
            <h2 class="font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl lg:text-6xl">Engineering applied to real problems.</h2>
        </div>
        <div class="mt-14 space-y-8 lg:space-y-12">
            @foreach ([
                [
                    'Kirada', 'Property Management Platform',
                    'Rental operations involve disconnected records, payment evidence, maintenance, documents and communication.',
                    'A multi-role platform connecting properties, units, tenants, leases, invoices, payment proofs, maintenance and messaging.',
                    ['Laravel', 'Multi-tenancy', 'Payments', 'Documents', 'Role-based access', 'Localization'],
                    'https://kirada.buildwithabdallah.com', 'View Platform',
                ],
                [
                    'Central API', 'Integration Platform',
                    'Products integrating providers independently create duplicated credential, retry and audit responsibilities.',
                    'A central HMAC-signed API boundary with queued, idempotent processing for WhatsApp, Stripe and connected products.',
                    ['Laravel', 'REST API', 'HMAC-SHA256', 'Queues', 'Idempotency', 'Audit logging'],
                    'https://api.buildwithabdallah.com/about', 'Read the Architecture',
                ],
                [
                    'AI Ad Studio', 'Controlled Media Workflow',
                    'Generating media variations requires preserving approved product assets and managing processing and review states.',
                    'A workflow connecting media processing, generation jobs, review states and delivery for platform-ready variations.',
                    ['Python', 'FastAPI', 'Celery', 'Media processing', 'Review workflow', 'Background jobs'],
                    'https://adstudio.buildwithabdallah.com', 'View Platform',
                ],
            ] as $index => [$name, $category, $problem, $built, $technologies, $href, $cta])
                <article class="reveal case-study grid min-h-[520px] overflow-hidden rounded-xl border border-line bg-surface lg:grid-cols-[1.1fr_0.9fr]" data-delay="{{ min($index, 3) }}">
                    @if ($index === 0)
                        <div class="case-study__visual relative min-h-[320px] overflow-hidden border-b border-line bg-panel lg:min-h-full lg:border-b-0 lg:border-r">
                            <img src="https://buildwithabdallah.com/storage/covers/01KXXD1NG9X4YDDVRGCH9SKGV1.png" alt="Kirada property management platform interface" loading="lazy" class="absolute inset-0 h-full w-full object-cover">
                        </div>
                    @else
                        <div @class([
                            'case-study__visual relative flex min-h-[320px] items-center overflow-hidden border-b border-line bg-panel p-6 sm:p-10 lg:min-h-full lg:border-b-0',
                            'lg:order-2 lg:border-l' => $index % 2 === 1,
                            'lg:border-r' => $index % 2 === 0,
                        ])>
                            <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid-sm opacity-55 [mask-image:radial-gradient(ellipse_at_center,#000,transparent_75%)]"></div>
                            <div class="relative mx-auto w-full max-w-[560px] rounded-lg border border-lineH bg-surface p-5 shadow-pop sm:p-7">
                                <div class="flex items-center justify-between border-b border-line pb-4 text-xs text-mute"><span>{{ $category }}</span><span class="inline-flex items-center gap-2"><i class="h-1.5 w-1.5 rounded-full {{ $index === 1 ? 'bg-live' : 'bg-brand-500' }}"></i>{{ $index === 1 ? 'Live' : 'Workflow' }}</span></div>
                                <div class="mt-5 grid grid-cols-[84px_1fr] gap-4">
                                    <div class="space-y-2"><div class="h-2 rounded-full bg-brand-500/25"></div><div class="h-2 rounded-full bg-line"></div><div class="h-2 rounded-full bg-line"></div><div class="h-2 rounded-full bg-line"></div></div>
                                    <div class="space-y-3"><div class="h-20 rounded-sm border border-line bg-panel"></div><div class="grid grid-cols-3 gap-2"><div class="h-10 rounded-sm bg-panel"></div><div class="h-10 rounded-sm bg-panel"></div><div class="h-10 rounded-sm bg-panel"></div></div></div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div @class(['flex flex-col justify-center p-7 sm:p-9 lg:p-12', 'lg:order-1' => $index % 2 === 1])>
                        <div class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-read">{{ $category }}</div>
                        <h3 class="mt-4 font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">{{ $name }}</h3>
                        <div class="mt-6 border-t border-line pt-5">
                            <div class="text-xs font-semibold uppercase tracking-[0.08em] text-mute">Problem</div>
                            <p class="mt-2 text-base leading-7 text-dim">{{ $problem }}</p>
                        </div>
                        <div class="mt-5">
                            <div class="text-xs font-semibold uppercase tracking-[0.08em] text-mute">What was built</div>
                            <p class="mt-2 text-base leading-7 text-dim">{{ $built }}</p>
                        </div>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach ($technologies as $technology)
                                <span class="rounded-full border border-line bg-panel px-2.5 py-1 text-xs font-medium text-ink2">{{ $technology }}</span>
                            @endforeach
                        </div>
                        <a href="{{ $href }}" target="_blank" rel="noopener noreferrer" class="group mt-auto inline-flex items-center gap-2 pt-7 text-sm font-semibold text-brand-read">
                            {{ $cta }} <span class="transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Government & public sector --}}
<section class="relative overflow-hidden border-b border-line bg-navy-900 text-white">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid-sm opacity-25 [mask-image:radial-gradient(ellipse_at_right,#000,transparent_72%)]"></div>
    <div class="pointer-events-none absolute -right-32 top-1/2 h-[520px] w-[520px] -translate-y-1/2 rounded-full bg-brand-500/10 blur-3xl"></div>
    <div class="relative mx-auto grid max-w-[1400px] gap-12 px-5 py-24 sm:py-28 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:px-8 lg:py-36 xl:px-10">
        <div class="reveal">
            <div class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-300">Government &amp; Public Sector</div>
            <h2 class="mt-6 max-w-[16ch] font-display text-[clamp(2.75rem,5vw,5.5rem)] font-semibold leading-[.98] tracking-[-0.04em]">
                Public-sector software doesn&rsquo;t need to feel legacy.
            </h2>
            <p class="mt-7 max-w-[680px] text-[1.0625rem] leading-7 text-white/70">Build With Abdallah helps organizations modernize applications, connect systems, automate workflows and support production software.</p>
            <a href="{{ route('government') }}" class="group mt-9 inline-flex min-h-12 items-center gap-3 rounded-sm bg-white px-6 py-3 font-semibold text-navy-900 transition hover:bg-brand-50">
                Explore Public-Sector Capabilities <span class="transition-transform group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
            </a>
        </div>
        <div class="reveal border-l border-white/15 pl-6 sm:pl-8" data-delay="1">
            <div class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-white/45">Capabilities</div>
            <div class="mt-5 divide-y divide-white/15 border-y border-white/15">
                @foreach (['Custom Applications', 'Legacy Modernization', 'Database Systems', 'API Integration', 'Automation', 'Application Support', 'Technical Documentation'] as $index => $capability)
                    <div class="flex items-center gap-4 py-3.5"><span class="font-mono text-xs text-brand-300/65">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span><span class="font-semibold text-white/80">{{ $capability }}</span></div>
                @endforeach
            </div>
            <div class="mt-7">
                <div class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-white/45">Available for</div>
                <p class="mt-3 text-sm leading-7 text-white/65">Project-based engagements &middot; Milestone-based delivery &middot; Statement of Work engagements</p>
            </div>
        </div>
    </div>
</section>

{{-- Why us --}}
<section class="border-b border-line bg-surface">
    <div class="mx-auto max-w-[1400px] px-5 py-20 sm:py-24 lg:px-8 lg:py-28 xl:px-10">
        <div class="reveal flex items-center gap-3">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-read">Why Build With Abdallah</span>
            <span class="h-px flex-1 bg-gradient-to-r from-lineH to-transparent"></span>
            <span class="font-mono text-[0.6875rem] text-mute">04 / 06</span>
        </div>
        <h2 class="reveal mt-8 max-w-[19ch] font-display text-4xl font-semibold leading-[1.05] tracking-[-0.03em] text-ink sm:text-5xl" data-delay="1">Experienced engineering without unnecessary complexity.</h2>
        <div class="mt-14 grid gap-px overflow-hidden rounded-lg border border-line bg-line md:grid-cols-2">
            @foreach ([
                ['Direct Engineering Access', 'Work directly with the engineer responsible for architecture and implementation.'],
                ['Maintainable Systems', 'Clean, understandable and testable software designed for long-term ownership.'],
                ['Integration Experience', 'Experience connecting APIs, databases, legacy applications and external services.'],
                ['Documentation & Handoff', 'Projects include maintainable source code and appropriate technical documentation.'],
            ] as $index => [$title, $copy])
                <article class="reveal bg-bg p-7 sm:p-8 lg:p-10" data-delay="{{ $index }}">
                    <div class="flex items-center gap-3"><span class="font-mono text-xs text-brand-read">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span><span class="h-px flex-1 bg-line"></span></div>
                    <h3 class="mt-7 font-display text-2xl font-semibold text-ink">{{ $title }}</h3>
                    <p class="mt-4 max-w-[50ch] text-base leading-7 text-dim">{{ $copy }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Engineering stack --}}
<section class="border-b border-line bg-bg">
    <div class="mx-auto max-w-[1400px] px-5 py-20 sm:py-24 lg:px-8 lg:py-28 xl:px-10">
        <div class="reveal flex items-center gap-3">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-read">Engineering stack</span>
            <span class="h-px flex-1 bg-gradient-to-r from-lineH to-transparent"></span>
            <span class="font-mono text-[0.6875rem] text-mute">05 / 06</span>
        </div>
        <div class="reveal mt-8 flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between" data-delay="1">
            <h2 class="font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">Technology chosen around the problem.</h2>
            <p class="max-w-md text-base leading-7 text-dim">A practical stack for maintainable applications, connected systems and reliable operations.</p>
        </div>
        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
            @foreach ([
                ['Application', ['PHP 8.x', 'Laravel', 'CLI PHP', 'Python', 'C#', 'VB.NET']],
                ['Frontend', ['Livewire', 'Vue', 'React', 'Next.js', 'Tailwind']],
                ['Data', ['SQL Server', 'Stored Procedures', 'PostgreSQL', 'MySQL', 'Redis']],
                ['Integration & Automation', ['REST', 'SOAP', 'XML / JSON', 'Background Workers', 'Scheduled Jobs']],
                ['Infrastructure', ['Linux', 'AWS', 'Hetzner', 'Docker', 'CI/CD']],
            ] as $index => [$group, $items])
                <div class="reveal rounded-lg border border-line bg-surface p-6" data-delay="{{ $index }}">
                    <h3 class="font-mono text-[0.6875rem] uppercase tracking-[0.15em] text-brand-read">{{ $group }}</h3>
                    <ul class="mt-5 space-y-3">
                        @foreach ($items as $item)
                            <li class="flex items-center gap-2.5 text-sm font-medium text-ink2"><span class="h-1 w-1 rounded-full bg-brand-500" aria-hidden="true"></span>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Journal --}}
<section id="journal" class="border-b border-line bg-surface">
    <div class="mx-auto max-w-[1400px] px-5 py-20 sm:py-24 lg:px-8 xl:px-10">
        <div class="reveal flex items-center gap-3">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
            <span class="font-mono text-[0.6875rem] uppercase tracking-[0.18em] text-brand-read">Journal &amp; Videos</span>
            <span class="h-px flex-1 bg-gradient-to-r from-lineH to-transparent"></span>
            <span class="font-mono text-[0.6875rem] text-mute">06 / 06</span>
        </div>
        <div class="reveal mt-8 flex flex-wrap items-end justify-between gap-6" data-delay="1">
            <div><h2 class="font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">Technical writing and field notes.</h2><p class="mt-4 max-w-2xl text-base leading-7 text-dim">Practical documentation of software engineering, integration and automation work.</p></div>
            <a href="{{ route('tutorials.index') }}" class="text-sm font-semibold text-brand-read">View Journal &rarr;</a>
        </div>
        <div class="mt-12 grid gap-5 md:grid-cols-3">
            @forelse ($latestTutorials as $index => $post)
                <article class="reveal group overflow-hidden rounded-lg border border-line bg-bg transition hover:border-lineH" data-delay="{{ $index }}">
                    <x-post-cover :post="$post"><span class="absolute left-3 top-3 rounded-xs border border-line bg-bg/90 px-2 py-1 text-xs font-semibold text-brand-read">Journal</span></x-post-cover>
                    <div class="p-6">
                        <div class="text-xs font-semibold uppercase tracking-[0.08em] text-mute">{{ $post->category?->name ?? 'Engineering' }}</div>
                        <h3 class="mt-3 font-display text-xl font-semibold leading-snug text-ink transition group-hover:text-brand-read">{{ $post->title }}</h3>
                        <p class="mt-3 line-clamp-2 text-sm leading-6 text-dim">{{ $post->excerpt }}</p>
                        <a href="{{ route('tutorials.show', $post->slug) }}" class="mt-5 inline-flex text-sm font-semibold text-brand-read" aria-label="Read {{ $post->title }}">Read article &rarr;</a>
                    </div>
                </article>
            @empty
                <div class="rounded-lg border border-dashed border-line bg-bg p-10 text-center md:col-span-3"><h3 class="font-display text-2xl text-ink">Technical articles are on the way.</h3></div>
            @endforelse
        </div>
        @if ($latestVideos->isNotEmpty())
            <div class="reveal mt-10 flex flex-wrap items-center gap-3">
                <span class="text-sm font-semibold text-ink2">Latest videos:</span>
                @foreach ($latestVideos as $video)
                    <a href="{{ route('videos.show', $video->slug) }}" class="rounded-full border border-line bg-bg px-3 py-2 text-sm text-dim transition hover:border-lineH hover:text-ink">{{ $video->title }}</a>
                @endforeach
                <a href="{{ route('videos.index') }}" class="text-sm font-semibold text-brand-read">All videos &rarr;</a>
            </div>
        @endif
    </div>
</section>

{{-- Final CTA --}}
<section class="relative overflow-hidden border-b border-line bg-panel">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid opacity-35 [mask-image:radial-gradient(ellipse_at_center,#000,transparent_72%)]"></div>
    <div class="relative mx-auto max-w-[1400px] px-5 py-20 text-center sm:py-24 lg:px-8 lg:py-28 xl:px-10">
        <div class="eyebrow reveal justify-center">Start a conversation</div>
        <h2 class="reveal mx-auto mt-6 max-w-[18ch] font-display text-4xl font-semibold leading-[1.03] tracking-[-0.03em] text-ink sm:text-5xl lg:text-6xl" data-delay="1">Have a system that needs to be built, connected or modernized?</h2>
        <p class="reveal mx-auto mt-6 max-w-[620px] text-[1.0625rem] leading-7 text-dim" data-delay="2">Tell us about the workflow, application or technical problem your organization needs to solve.</p>
        <div class="reveal mt-9 flex flex-col justify-center gap-3 sm:flex-row" data-delay="3">
            <a href="{{ route('contact.index') }}" class="inline-flex min-h-12 items-center justify-center rounded-sm bg-brand-500 px-6 py-3 font-semibold text-brand-ink shadow-glow-sm transition hover:bg-brand-400">Discuss a Project</a>
            <a href="{{ route('government') }}" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-lineH bg-surface px-6 py-3 font-semibold text-ink transition hover:bg-elev">Government &amp; Public Sector</a>
        </div>
        <div class="reveal mt-8 flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm font-medium text-mute" data-delay="4">
            <span>Maine, USA</span><span class="hidden sm:inline" aria-hidden="true">&middot;</span>
            <span>Available for projects throughout the United States</span><span class="hidden sm:inline" aria-hidden="true">&middot;</span>
            <a href="mailto:buildwithabdallah@gmail.com" class="transition hover:text-ink">buildwithabdallah@gmail.com</a>
        </div>
    </div>
</section>

{{-- Newsletter preserved as a secondary resource --}}
<section class="bg-bg">
    <div class="mx-auto grid max-w-[1400px] gap-8 px-5 py-14 md:grid-cols-[1fr_minmax(0,520px)] md:items-center lg:px-8 xl:px-10">
        <div><div class="font-mono text-[0.6875rem] uppercase tracking-[0.16em] text-brand-read">Engineering newsletter</div><h2 class="mt-3 font-display text-2xl font-semibold text-ink sm:text-3xl">Practical notes from systems being built.</h2></div>
        <form action="{{ route('newsletter.store') }}" method="POST">
            @csrf
            <input type="hidden" name="source" value="home">
            @if (session('newsletter_success'))<div class="mb-3 rounded-sm border border-live/40 bg-live/10 px-4 py-3 text-sm text-live">{{ session('newsletter_success') }}</div>@endif
            <label for="newsletter-email" class="sr-only">Email address</label>
            <div class="flex flex-col gap-2 sm:flex-row">
                <input id="newsletter-email" type="email" name="email" value="{{ old('email') }}" required placeholder="you@organization.com" class="min-h-12 min-w-0 flex-1 rounded-sm border border-line bg-surface px-4 py-3 text-sm text-ink outline-none placeholder:text-faint focus:border-brand-500">
                <button type="submit" class="min-h-12 rounded-sm bg-ink px-6 py-3 text-sm font-semibold text-bg transition hover:bg-ink2">Subscribe</button>
            </div>
            @error('email')<p class="mt-2 text-sm text-crit">{{ $message }}</p>@enderror
        </form>
    </div>
</section>

@endsection
