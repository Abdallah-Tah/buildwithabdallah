@extends('layouts.app', [
    'title' => 'Manufacturing Software Development & Systems Integration | Build With Abdallah',
    'metaDescription' => 'Maine manufacturing software development and integration for shop-floor applications, InfinityQS ProFicient, SQL Server, SOAP services, RS-232 devices, legacy modernization and automation.',
])

@section('content')
<section class="relative min-h-[calc(88svh-4.75rem)] overflow-hidden border-b border-line bg-panel" data-hero-scene>
    <div class="pointer-events-none absolute inset-0 bg-grid-dark bg-grid opacity-55 [mask-image:radial-gradient(ellipse_80%_75%_at_65%_35%,#000_25%,transparent_80%)]"></div>
    <div class="aurora"></div>
    <div class="relative mx-auto grid min-h-[calc(88svh-4.75rem)] max-w-[1400px] items-center gap-14 px-5 py-16 lg:grid-cols-[0.94fr_1.06fr] lg:px-8 xl:px-10">
        <div>
            <div class="eyebrow reveal">Industrial software · Manufacturing systems · Maine</div>
            <h1 class="reveal mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.7vw,6.4rem)] font-semibold leading-[0.94] tracking-[-0.05em] text-ink" data-delay="1">
                Software that connects the shop floor to the systems running the business.
            </h1>
            <p class="reveal mt-7 max-w-[58ch] text-lg leading-8 text-dim" data-delay="2">
                Build With Abdallah develops, integrates and modernizes manufacturing applications, quality systems, equipment interfaces, databases and enterprise workflows.
            </p>
            <div class="reveal mt-9 flex flex-col gap-3 sm:flex-row" data-delay="3">
                <a href="{{ route('contact.index', ['project_type' => 'Manufacturing Software']) }}" class="inline-flex min-h-12 items-center justify-center rounded-sm bg-brand-500 px-6 py-3 font-semibold text-brand-ink shadow-glow-sm transition hover:bg-brand-400">Discuss a Manufacturing Project <span class="ml-2" aria-hidden="true">&rarr;</span></a>
                <a href="#capabilities" class="inline-flex min-h-12 items-center justify-center rounded-sm border border-lineH bg-surface/70 px-6 py-3 font-semibold text-ink backdrop-blur transition hover:bg-elev">Explore capabilities</a>
            </div>
        </div>
        <div class="reveal" data-delay="2" data-parallax="0.035"><x-industrial-flow /></div>
    </div>
</section>

<section class="border-b border-line bg-bg">
    <div class="mx-auto grid max-w-[1400px] gap-12 px-5 py-20 lg:grid-cols-[0.85fr_1.15fr] lg:px-10 lg:py-32">
        <div class="lg:sticky lg:top-32 lg:self-start">
            <div class="eyebrow reveal">The operational reality</div>
            <h2 class="reveal mt-5 max-w-[13ch] font-display text-4xl font-semibold leading-[1.02] tracking-[-0.035em] text-ink sm:text-5xl lg:text-6xl">Manufacturing software rarely lives in one system.</h2>
            <p class="reveal mt-6 max-w-[40ch] text-lg leading-8 text-dim">Modern software should connect what already works—not force an organization to start over.</p>
        </div>
        <div class="divide-y divide-line border-y border-line">
            @foreach (['Production equipment', 'Measurement devices', 'Operator workstations', 'Quality systems', 'Legacy applications', 'SQL databases', 'ERP / MES services', 'APIs, reports and automation'] as $item)
                <div class="reveal flex min-h-24 items-center gap-6 py-6"><span class="font-mono text-xs text-brand-read">0{{ $loop->iteration }}</span><span class="font-display text-2xl text-ink sm:text-3xl">{{ $item }}</span></div>
            @endforeach
            <div class="reveal py-10 font-display text-3xl font-semibold text-brand-read sm:text-4xl">We connect the pieces.</div>
        </div>
    </div>
</section>

<section id="capabilities" class="border-b border-line bg-panel/35 scroll-mt-24">
    <div class="mx-auto max-w-[1400px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="eyebrow reveal">Industrial &amp; manufacturing systems</div>
        <h2 class="reveal mt-5 max-w-[18ch] font-display text-4xl font-semibold tracking-[-0.035em] text-ink sm:text-5xl">Engineering across equipment, data and applications.</h2>
        <div class="mt-14 grid gap-px overflow-hidden rounded-lg border border-line bg-line md:grid-cols-2">
            @foreach ([
                ['01', 'Shop-floor applications', 'Applications supporting production, inspection, operators, engineering and quality workflows.', 'Laravel · PHP · Python · C#'],
                ['02', 'Quality system integration', 'Experience integrating with InfinityQS ProFicient, measurement systems, data acquisition, quality workflows and reporting.', 'Quality data · DMS / DCS · SQL Server'],
                ['03', 'Device & edge integration', 'Bridge modern software with RS-232 / RS-422 equipment, COM ports, local workstations and TCP/IP devices.', 'Serial · COM · TCP/IP · local services'],
                ['04', 'Enterprise integration', 'Connect REST APIs, SOAP services, databases, files and business systems around reliable operational workflows.', 'REST · SOAP · XML · JSON'],
                ['05', 'Legacy modernization', 'Move VB / VB.NET desktop applications and older workflows toward maintainable, incrementally modernized architectures.', 'VB.NET · C# · Laravel · SQL Server'],
                ['06', 'Data & automation', 'Stored procedures, SQL Server Agent jobs, scheduled processing, transformation, alerts and background workflows.', 'SQL Server · workers · scheduling'],
            ] as [$n, $title, $copy, $meta])
                <article class="reveal bg-surface p-7 sm:p-9 lg:p-11">
                    <div class="font-mono text-xs uppercase tracking-[0.14em] text-brand-read">{{ $n }}</div>
                    <h3 class="mt-8 max-w-[16ch] font-display text-3xl font-semibold leading-tight text-ink">{{ $title }}</h3>
                    <p class="mt-5 max-w-[54ch] text-base leading-7 text-dim">{{ $copy }}</p>
                    <div class="mt-8 border-t border-line pt-4 font-mono text-[0.6875rem] uppercase tracking-[0.12em] text-mute">{{ $meta }}</div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="border-b border-line bg-[#07172b] text-white">
    <div class="mx-auto grid max-w-[1400px] gap-14 px-5 py-20 lg:grid-cols-[0.9fr_1.1fr] lg:px-10 lg:py-28">
        <div>
            <div class="font-mono text-xs uppercase tracking-[0.16em] text-sky-300">Quality system integration</div>
            <h2 class="reveal mt-5 max-w-[15ch] font-display text-4xl font-semibold leading-tight tracking-[-0.035em] sm:text-5xl">InfinityQS ProFicient &amp; Quality Data Integration</h2>
            <p class="reveal mt-6 max-w-[58ch] text-lg leading-8 text-slate-300">Integrate manufacturing and measurement workflows with quality systems such as InfinityQS ProFicient, connecting production equipment, data-acquisition services, databases and enterprise applications.</p>
            <p class="mt-6 max-w-[62ch] text-sm leading-6 text-slate-400">Build With Abdallah has experience integrating with InfinityQS ProFicient. It is not presented as an InfinityQS affiliate, certified integrator or authorized partner.</p>
        </div>
        <div class="grid content-start grid-cols-2 gap-3 sm:grid-cols-3">
            @foreach (['InfinityQS ProFicient', 'DMS / DCS workflows', 'Quality data collection', 'Enterprise data exchange', 'SQL Server', 'Measurement systems', 'Serial devices', 'TCP/IP', 'OPC-connected systems', 'Automated processing'] as $chip)
                <div class="reveal rounded-sm border border-white/15 bg-white/[0.04] px-4 py-4 text-sm text-slate-200">{{ $chip }}</div>
            @endforeach
        </div>
    </div>
</section>

<section class="border-b border-line">
    <div class="mx-auto max-w-[1400px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="grid gap-14 lg:grid-cols-2">
            <div>
                <div class="eyebrow">Device &amp; edge integration</div>
                <h2 class="mt-5 font-display text-4xl font-semibold tracking-tight text-ink sm:text-5xl">Connect physical equipment to modern software.</h2>
                <p class="mt-6 text-lg leading-8 text-dim">Modern applications sometimes need to communicate with equipment designed long before REST APIs existed. The appropriate bridge depends on protocol documentation, operating system, hardware interface, network topology and manufacturer specifications.</p>
                <div class="mt-8 flex flex-wrap gap-2">@foreach (['RS-232 / RS-422', 'COM ports', 'TCP/IP devices', 'Local device services', 'Serial-to-Ethernet', 'Web Serial where appropriate', 'PHP / Python / C#', 'Store-and-forward'] as $chip)<span class="rounded-full border border-line px-3 py-2 text-sm text-ink2">{{ $chip }}</span>@endforeach</div>
            </div>
            <aside class="rounded-lg border border-line bg-panel p-7 lg:p-9">
                <div class="font-mono text-xs uppercase tracking-[0.14em] text-brand-read">Architecture matters</div>
                <p class="mt-5 leading-7 text-dim">A process accesses a serial port only on the machine and operating system where that interface is available. A remote application does not directly open a workstation COM port.</p>
                <ol class="mt-7 space-y-4 text-ink2">
                    @foreach (['Local software or service bridge', 'Browser Web Serial where appropriate', 'RS-232-to-Ethernet gateway', 'Direct locally hosted application', 'Existing acquisition systems such as InfinityQS DMS / Gage Server'] as $option)
                        <li class="flex gap-4 border-t border-line pt-4"><span class="font-mono text-xs text-brand-read">0{{ $loop->iteration }}</span><span>{{ $option }}</span></li>
                    @endforeach
                </ol>
            </aside>
        </div>
    </div>
</section>

<section class="border-b border-line bg-panel/40">
    <div class="mx-auto max-w-[1400px] px-5 py-20 lg:px-10 lg:py-28">
        <div class="eyebrow">Legacy modernization</div>
        <div class="mt-5 grid gap-10 lg:grid-cols-[0.8fr_1.2fr]">
            <div><h2 class="font-display text-4xl font-semibold tracking-tight text-ink sm:text-5xl">Modernization does not always mean replacing everything.</h2><p class="mt-6 text-lg leading-8 text-dim">Often the safest approach is to preserve proven business logic while progressively replacing fragile interfaces, manual processing and difficult-to-maintain components.</p></div>
            <div class="divide-y divide-line border-y border-line">
                @foreach ([['VB / VB.NET', 'Modern web application'], ['Manual SQL scripts', 'Auditable automated workflows'], ['Desktop-only workflow', 'Browser-based application'], ['Undocumented processing', 'Documented services + stored procedures'], ['Point-to-point integrations', 'Maintainable integration layer']] as [$from, $to])
                    <div class="reveal grid gap-2 py-5 sm:grid-cols-[1fr_auto_1fr] sm:items-center"><span class="text-dim">{{ $from }}</span><span class="text-brand-read" aria-hidden="true">&rarr;</span><strong class="font-medium text-ink">{{ $to }}</strong></div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="border-b border-line">
    <div class="mx-auto grid max-w-[1400px] gap-12 px-5 py-20 lg:grid-cols-2 lg:px-10 lg:py-28">
        <article>
            <div class="eyebrow">Enterprise integration</div>
            <h2 class="mt-5 font-display text-4xl font-semibold text-ink">Systems integration beyond REST APIs.</h2>
            <p class="mt-6 text-lg leading-8 text-dim">Real organizations operate a mix of modern APIs, enterprise services, databases, files, legacy applications and physical equipment. Integration layers should fit the systems that actually exist.</p>
            <p class="mt-5 leading-7 text-dim">REST · SOAP · XML · JSON · SQL Server · stored procedures · database workflows · scheduled jobs · files · TCP/IP · serial data · OAuth · SSO / SAML where appropriate</p>
        </article>
        <article>
            <div class="eyebrow">Production application support</div>
            <h2 class="mt-5 font-display text-4xl font-semibold text-ink">Shipping is only part of engineering.</h2>
            <p class="mt-6 text-lg leading-8 text-dim">Production systems require investigation across application, database, integration and infrastructure layers—followed by durable corrective fixes and documentation.</p>
            <p class="mt-5 leading-7 text-dim">Incident investigation · root-cause analysis · SQL troubleshooting · SOAP / API failures · performance · deployments · dependency upgrades · logging and observability</p>
        </article>
    </div>
</section>

<section class="bg-panel">
    <div class="mx-auto max-w-[1400px] px-5 py-20 text-center lg:px-10 lg:py-28">
        <div class="eyebrow reveal justify-center">Manufacturing software consulting</div>
        <h2 class="reveal mx-auto mt-6 max-w-[18ch] font-display text-4xl font-semibold tracking-tight text-ink sm:text-5xl">Connect equipment, operational data and business systems.</h2>
        <p class="reveal mx-auto mt-6 max-w-[620px] text-lg leading-8 text-dim">Describe the equipment, workflow, existing systems and deployment constraints. We’ll begin with the architecture that fits the environment.</p>
        <a href="{{ route('contact.index', ['project_type' => 'Manufacturing Software']) }}" class="reveal mt-9 inline-flex min-h-12 items-center justify-center rounded-sm bg-brand-500 px-7 py-4 font-semibold text-brand-ink shadow-glow-sm hover:bg-brand-400">Discuss a Manufacturing Project <span class="ml-2" aria-hidden="true">&rarr;</span></a>
    </div>
</section>
@endsection
