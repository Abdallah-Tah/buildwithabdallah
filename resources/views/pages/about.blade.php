@extends('layouts.app', [
    'title' => 'About — Build With Abdallah',
    'metaDescription' => 'Meet Abdallah Mohamed, founder and lead software engineer of Maine-based Build With Abdallah, with more than eight years of software-development experience.',
])

@section('content')

{{-- ================================================================= HERO --}}
<section class="relative overflow-hidden border-b border-line">
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid [mask-image:radial-gradient(ellipse_70%_60%_at_50%_25%,#000_35%,transparent_85%)]"></div>
    <div class="aurora"></div>

    <div class="relative mx-auto max-w-[1280px] px-5 py-16 lg:px-10 lg:py-24">
        <nav aria-label="Breadcrumb" class="reveal mb-8 flex items-center gap-2 font-mono text-2xs uppercase tracking-[0.12em] text-mute">
            <a href="{{ route('home') }}" class="transition hover:text-ink2">Home</a>
            <span aria-hidden="true">/</span>
            <span class="text-ink2">About</span>
        </nav>

        <div class="grid items-end gap-12 lg:grid-cols-[1fr_minmax(0,420px)]">
            <div>
                <div class="eyebrow reveal">About</div>
                <h1 class="reveal mt-5 max-w-[20ch] font-display text-[2.5rem] leading-[1.06] tracking-tight text-ink sm:text-5xl lg:text-6xl" data-delay="1">
                    Founder-led software engineering with <span class="motion-accent text-brand-500">direct accountability.</span>
                </h1>
                <p class="reveal mt-7 max-w-[62ch] text-lg leading-relaxed text-dim" data-delay="2">
                    Abdallah is the Founder &amp; Lead Software Engineer of Build With Abdallah. He has
                    more than eight years of experience building, integrating, modernizing and supporting
                    business-critical software from Brunswick, Maine.
                </p>

                <div class="reveal mt-8 flex flex-wrap gap-2" data-delay="3">
                    @foreach (['8+ years software experience', 'Laravel · Python · C# · VB.NET', 'Manufacturing · quality · devices', 'Maine-based'] as $chip)
                        <span class="rounded-sm border border-line bg-surface px-3 py-2 text-sm text-ink2">{{ $chip }}</span>
                    @endforeach
                </div>
            </div>

            <div class="reveal rounded-lg border border-line bg-surface p-4 shadow-card" data-delay="2">
                <img src="{{ asset('brand/banner.png') }}" alt="Build With Abdallah brand banner"
                     loading="lazy" class="w-full rounded-sm border border-line object-cover">
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ HOW I WORK --}}
<section class="border-b border-line">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="grid gap-10 lg:grid-cols-[0.95fr_1.05fr] lg:gap-16">
            <div class="reveal">
                <div class="eyebrow">How I work</div>
                <h2 class="mt-4 max-w-[16ch] font-display text-3xl tracking-tight text-ink sm:text-4xl lg:text-5xl">
                    Clear scope. Useful systems. No hype.
                </h2>
            </div>
            <div class="reveal space-y-6 text-lg leading-relaxed text-dim" data-delay="1">
                <p>His work spans PHP and Laravel, Python, C#, VB.NET, SQL Server, REST and SOAP services, manufacturing applications, quality systems, device integration, legacy modernization, automation and production support.</p>
                <p>He has experience translating existing business processes and undocumented legacy logic into maintainable applications, services, database workflows and automation—without exposing confidential implementation details.</p>
                <p>Build With Abdallah gives organizations direct access to the engineer responsible for discovery, architecture and implementation.</p>
                <p>Projects prioritize understandable, testable systems with maintainable source code, deployment guidance and technical documentation.</p>
            </div>
        </div>

        <div class="reveal mt-14 grid gap-px overflow-hidden rounded-md border border-line bg-line md:grid-cols-3">
            @foreach ([
                ['01', 'Ship useful MVPs', 'Start with the right scope, database, admin workflow and a clean public interface.'],
                ['02', 'Automate real work', 'Use APIs, agents and alerts to reduce manual steps and missed follow-ups.'],
                ['03', 'Explain the work', 'Publish tutorials and build notes that show how the systems are actually made.'],
            ] as [$n, $heading, $copy])
                <article class="bg-surface p-8">
                    <div class="font-mono text-2xs uppercase tracking-[0.14em] text-brand-read">{{ $n }}</div>
                    <h3 class="mt-5 font-display text-2xl text-ink lg:text-3xl">{{ $heading }}</h3>
                    <p class="mt-4 leading-relaxed text-dim">{{ $copy }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="eyebrow reveal">Experience areas</div>
        <h2 class="reveal mt-4 max-w-[18ch] font-display text-3xl tracking-tight text-ink sm:text-5xl">Engineering across the operational stack.</h2>
        <div class="mt-12 grid gap-px overflow-hidden rounded-lg border border-line bg-line sm:grid-cols-2 lg:grid-cols-3">
            @foreach ([
                ['Application development', 'PHP · Laravel · Python · C# · VB.NET'],
                ['Data', 'SQL Server · PostgreSQL · MySQL · Stored procedures'],
                ['Integration', 'REST · SOAP · XML · JSON · Webhooks'],
                ['Manufacturing', 'InfinityQS ProFicient · Quality data · Device integration'],
                ['Industrial connectivity', 'RS-232 · Serial · COM · TCP/IP'],
                ['Frontend', 'Livewire · Vue · React · Tailwind'],
                ['Infrastructure', 'Linux · Nginx · AWS · Hetzner · Cloudflare'],
                ['Security', 'OAuth · SSO / SAML · Secure APIs · Authorization'],
                ['Automation', 'Background jobs · Scheduling · Data processing'],
            ] as [$area, $skills])
                <article class="reveal bg-surface p-7"><h3 class="font-mono text-xs uppercase tracking-[0.14em] text-brand-read">{{ $area }}</h3><p class="mt-4 leading-7 text-dim">{{ $skills }}</p></article>
            @endforeach
        </div>
    </div>
</section>

{{-- ================================================================ PROOF --}}
<section class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1280px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="reveal mb-12 max-w-[46ch]">
            <div class="eyebrow">In practice</div>
            <h2 class="mt-4 font-display text-3xl tracking-tight text-ink sm:text-4xl lg:text-5xl">
                Systems I run, not just ones I talk about.
            </h2>
            <p class="mt-5 text-dim">
                Every product below runs in production on infrastructure I operate myself.
            </p>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @foreach ([
                ['Kirada', 'Rental operations SaaS — properties, leases, invoices, payment proofs and messaging in one workflow.', 'https://kirada.buildwithabdallah.com', 'Laravel · SaaS'],
                ['Central API', 'The single credential boundary between WhatsApp, Stripe and every product I run. Signed, queued, idempotent.', 'https://api.buildwithabdallah.com/about', 'Platform · Integration'],
                ['AI Ad Studio', 'Turns real product photos into platform-ready video ads through a controlled review workflow.', 'https://adstudio.buildwithabdallah.com', 'Python · AI media'],
            ] as $index => [$name, $copy, $href, $tag])
                <article class="reveal motion-card flex flex-col rounded-lg border border-line bg-surface p-7" @if ($index > 0) data-delay="{{ $index }}" @endif>
                    <div class="font-mono text-2xs uppercase tracking-[0.12em] text-mute">{{ $tag }}</div>
                    <h3 class="mt-3 font-display text-2xl text-ink">{{ $name }}</h3>
                    <p class="mt-3 flex-1 leading-relaxed text-dim">{{ $copy }}</p>
                    <a href="{{ $href }}" target="_blank" rel="noopener noreferrer"
                       class="ul-link mt-6 inline-flex items-center gap-2 self-start font-mono text-2xs uppercase tracking-[0.1em] text-brand-read">
                        Visit <span aria-hidden="true">&rarr;</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ================================================================== CTA --}}
<section class="relative overflow-hidden">
    <div class="pointer-events-none absolute inset-0 bg-brand-glow"></div>
    <div class="relative mx-auto max-w-[1280px] px-5 py-24 text-center lg:px-10">
        <h2 class="reveal mx-auto max-w-[20ch] font-display text-3xl tracking-tight text-ink sm:text-4xl lg:text-5xl">
            Discuss your software requirements.
        </h2>
        <p class="reveal mx-auto mt-6 max-w-[50ch] text-lg text-dim" data-delay="1">
            Share the problem, current constraints and desired outcome to begin a focused technical conversation.
        </p>
        <div class="reveal mt-9 flex flex-col justify-center gap-3 sm:flex-row" data-delay="2">
            <a href="{{ route('contact.index') }}" data-magnetic
               class="magnetic inline-flex items-center justify-center gap-3 rounded-sm bg-brand-500 px-7 py-4 font-semibold text-brand-ink shadow-glow transition hover:bg-brand-400">
                Discuss Your Project
            </a>
            <a href="{{ route('services') }}"
               class="inline-flex items-center justify-center rounded-sm border border-line bg-surface px-6 py-4 text-ink transition hover:border-lineH hover:bg-elev">
                View Our Capabilities
            </a>
        </div>
    </div>
</section>

@endsection
