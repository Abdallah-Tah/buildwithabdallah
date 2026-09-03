@extends('layouts.app', [
    'title' => 'Government Software Development & IT Consulting | Build With Abdallah',
    'metaDescription' => 'Maine-based custom software development, legacy modernization, systems integration, database, automation and application support services for public-sector organizations.',
])

@section('content')
@php
    $identifiers = array_filter([
        'D-U-N-S' => config('services.contracting.duns'),
        'UEI' => config('services.contracting.uei'),
        'State of Maine Vendor Code' => config('services.contracting.maine_vendor_code'),
        'CAGE Code' => config('services.contracting.cage_code'),
    ], fn ($value) => filled($value));
    $capabilityStatementUrl = config('services.contracting.capability_statement_url');
@endphp

<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_20%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>
    <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-24">
        <nav aria-label="Breadcrumb" class="mb-8 flex items-center gap-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
            <a href="{{ route('home') }}" class="transition hover:text-ink2">Home</a><span aria-hidden="true">/</span><span class="text-ink2">Government &amp; Public Sector</span>
        </nav>
        <div class="grid items-end gap-10 lg:grid-cols-[1fr_minmax(0,420px)]">
            <div>
                <div class="eyebrow">Government &amp; Public Sector Software Services</div>
                <h1 class="reveal mt-5 max-w-[18ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl">
                    Modern software for <span class="motion-accent text-brand-500">public-sector operations.</span>
                </h1>
            </div>
            <div class="reveal" data-delay="1">
                <p class="text-lg leading-relaxed text-dim">Build With Abdallah provides software-development and IT-consulting services for public agencies, municipalities, educational organizations and other public-sector entities.</p>
                <p class="mt-5 font-mono text-xs uppercase tracking-[0.12em] text-brand-read">Available for commercial and public-sector contracting opportunities.</p>
            </div>
        </div>
    </div>
</section>

<section class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="eyebrow">Public-sector capabilities</div>
        <h2 class="mt-4 max-w-[20ch] font-display text-3xl tracking-tight text-ink sm:text-5xl">Technical services for essential operations.</h2>
        <div class="mt-12 grid gap-px overflow-hidden rounded-md border border-line bg-line md:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['Custom software', 'Purpose-built web and mobile applications, portals and internal systems.'],
                ['Legacy modernization', 'Move aging applications and workflows toward maintainable modern architectures.'],
                ['System integration', 'APIs, databases, services and business systems connected reliably.'],
                ['Data solutions', 'SQL Server, reporting, transformation, synchronization and operational dashboards.'],
                ['Automation', 'Reduce repetitive administrative and operational work with monitored workflows.'],
                ['Application support', 'Maintenance, upgrades, monitoring and continued feature development.'],
                ['Secure development', 'Authentication, authorization, auditability, secrets management and defensive API design.'],
                ['Accessibility', 'Implement WCAG and Section 508 requirements when included in project scope.'],
                ['Cloud & deployment', 'Documented deployment, hosting architecture, observability and operational handoff.'],
            ] as [$title, $copy])
                <article class="reveal motion-card bg-surface p-7 lg:p-8" data-delay="{{ min($loop->index, 6) }}"><h3 class="font-display text-xl text-ink">{{ $title }}</h3><p class="mt-3 leading-relaxed text-dim">{{ $copy }}</p></article>
            @endforeach
        </div>
    </div>
</section>

<section class="border-b border-line bg-panel/40">
    <div class="mx-auto grid max-w-[1280px] gap-12 px-5 py-20 lg:grid-cols-2 lg:px-10 lg:py-28">
        <div>
            <div class="eyebrow">Delivery models</div>
            <h2 class="mt-4 font-display text-3xl text-ink sm:text-4xl">Flexible ways to engage.</h2>
            <ul class="mt-8 space-y-3 text-dim">
                @foreach (['Fixed-scope software projects', 'Milestone-based Statements of Work', 'Application modernization projects', 'System integration projects', 'Ongoing maintenance and support', 'Technical consulting'] as $model)
                    <li class="flex gap-3 border-t border-line pt-3"><span class="text-brand-500" aria-hidden="true">&rarr;</span><span>{{ $model }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="reveal motion-card rounded-lg border border-line bg-surface p-7 lg:p-9" data-delay="1">
            <div class="eyebrow">Contracting information</div>
            <dl class="mt-7 space-y-5">
                @foreach ([
                    'Business Name' => 'Build With Abdallah',
                    'Business Type' => 'Sole Proprietorship',
                    'Location' => 'Maine, United States',
                    'Primary Services' => 'Software Development & IT Consulting',
                ] as $term => $value)
                    <div><dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">{{ $term }}</dt><dd class="mt-1 text-ink2">{{ $value }}</dd></div>
                @endforeach
                <div><dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">NAICS</dt><dd class="mt-2 space-y-1 text-ink2"><div>541511 — Custom Computer Programming Services</div><div>541512 — Computer Systems Design Services</div><div>541519 — Other Computer Related Services</div></dd></div>
                @foreach ($identifiers as $term => $value)
                    <div><dt class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">{{ $term }}</dt><dd class="mt-1 text-ink2">{{ $value }}</dd></div>
                @endforeach
            </dl>
        </div>
    </div>
</section>

<section class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="eyebrow">Why Build With Abdallah</div>
        <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['Senior Engineering from Discovery Through Delivery', 'Clients work directly with the engineer responsible for architecture and implementation.'],
                ['Maintainable Architecture', 'Understandable, testable and documented systems take priority over unnecessary complexity.'],
                ['Integration Experience', 'Comfort working with APIs, databases, legacy systems, automation and existing infrastructure.'],
                ['Documentation & Handoff', 'Technical documentation, deployment instructions and maintainable source code are part of delivery.'],
                ['Maine-Based', 'Based in Maine and available for projects throughout Maine and the United States.'],
            ] as [$title, $copy])
                <article class="reveal motion-card rounded-lg border border-line bg-surface p-7" data-delay="{{ min($loop->index, 5) }}"><h2 class="font-display text-xl text-ink">{{ $title }}</h2><p class="mt-3 leading-relaxed text-dim">{{ $copy }}</p></article>
            @endforeach
        </div>
        <div class="mt-12 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('contact.index', ['project_type' => 'Government / Public Sector']) }}" class="inline-flex items-center justify-center rounded-sm bg-brand-500 px-7 py-4 font-semibold text-brand-ink shadow-glow hover:bg-brand-400">Discuss a Contract or SOW</a>
            <a href="{{ filled($capabilityStatementUrl) ? $capabilityStatementUrl : route('government.capability-statement') }}" class="inline-flex items-center justify-center rounded-sm border border-line bg-surface px-7 py-4 text-ink hover:bg-elev">View Capability Statement</a>
            <a href="{{ asset('documents/build-with-abdallah-capability-statement.pdf') }}" download class="inline-flex items-center justify-center rounded-sm border border-line bg-surface px-7 py-4 text-ink hover:bg-elev">Download PDF</a>
        </div>
    </div>
</section>

<section class="border-b border-line bg-navy-900 text-white">
    <div class="mx-auto grid max-w-[1280px] gap-12 px-5 py-20 lg:grid-cols-[0.9fr_1.1fr] lg:px-10 lg:py-24">
        <div>
            <div class="font-mono text-xs uppercase tracking-[0.16em] text-brand-300">Prime contractor partnerships</div>
            <h2 class="mt-5 max-w-[15ch] font-display text-4xl font-semibold tracking-tight sm:text-5xl">Partner With Build With Abdallah</h2>
            <p class="mt-6 max-w-[58ch] text-lg leading-8 text-white/70">Build With Abdallah is available to support prime contractors and technology vendors requiring software development, modernization, integration, database, automation or application-support capabilities.</p>
            <a href="{{ route('contact.index', ['project_type' => 'Subcontracting / Prime Contractor Partnership']) }}" class="mt-8 inline-flex min-h-12 items-center rounded-sm bg-brand-400 px-6 py-3 font-semibold text-brand-ink">Discuss a Partnership <span class="ml-2" aria-hidden="true">&rarr;</span></a>
        </div>
        <div>
            <div class="font-mono text-xs uppercase tracking-[0.16em] text-brand-300">Capabilities available for subcontracting</div>
            <div class="mt-6 grid grid-cols-2 gap-px overflow-hidden rounded-md border border-white/15 bg-white/15">
                @foreach (['Laravel / PHP', 'Python', 'SQL Server', 'REST / SOAP', 'Legacy modernization', 'Manufacturing systems', 'Device integration', 'Application support'] as $capability)
                    <div class="bg-navy-900 px-4 py-5 text-sm font-medium text-white/85">{{ $capability }}</div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-24">
        <div class="eyebrow">Relevant project experience</div>
        <h2 class="mt-4 max-w-[20ch] font-display text-3xl tracking-tight text-ink sm:text-5xl">Engineering applied to operational systems.</h2>
        <p class="mt-5 max-w-2xl leading-7 text-dim">The following experience is intentionally anonymized to protect confidential organizational and implementation details.</p>
        <div class="mt-10 grid gap-5 lg:grid-cols-3">
            @foreach ([
                ['legacy-manufacturing-modernization', 'Legacy Manufacturing Modernization', 'Critical production workflows depended on aging desktop software.', 'Business-rule analysis · VB / VB.NET · Laravel · SQL Server · incremental migration'],
                ['enterprise-soap-integration', 'Enterprise / SOAP Integration', 'Operational workflows required reliable exchange across enterprise services and databases.', 'REST / SOAP · XML / JSON · SQL Server · data transformation · troubleshooting'],
                ['quality-device-integration', 'Quality & Device Integration', 'Measurement data needed to move from connected equipment into quality and production workflows.', 'InfinityQS ProFicient · RS-232 · acquisition workflows · SQL Server · automation'],
            ] as [$slug, $title, $challenge, $engineering])
                <article class="flex flex-col rounded-lg border border-line bg-surface p-7"><h3 class="font-display text-2xl font-semibold text-ink">{{ $title }}</h3><p class="mt-4 flex-1 leading-7 text-dim">{{ $challenge }}</p><div class="mt-6 border-t border-line pt-4 font-mono text-xs leading-6 text-brand-read">{{ $engineering }}</div><a href="{{ route('case-studies.show', $slug) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-brand-read">Read case study <span aria-hidden="true">&rarr;</span></a></article>
            @endforeach
        </div>
    </div>
</section>
@endsection
