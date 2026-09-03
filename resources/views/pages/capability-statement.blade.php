<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Capability Statement | Build With Abdallah</title>
    <meta name="description" content="Build With Abdallah software development and IT consulting capability statement.">
    <style>
        :root{--navy:#07172b;--blue:#1677d2;--ink:#172234;--muted:#566273;--line:#d9e0e8;--paper:#fff}
        *{box-sizing:border-box}body{margin:0;background:#e9edf2;color:var(--ink);font:12px/1.42 Arial,sans-serif}.toolbar{display:flex;justify-content:center;gap:10px;padding:14px}.toolbar a,.toolbar button{border:0;border-radius:4px;padding:10px 15px;background:var(--navy);color:#fff;font-weight:700;text-decoration:none;cursor:pointer}.sheet{width:8.5in;min-height:11in;margin:0 auto 30px;background:var(--paper);box-shadow:0 20px 55px #26384c26}.head{display:grid;grid-template-columns:1fr 2.1in;gap:24px;padding:28px 32px 24px;background:var(--navy);color:#fff}.brand{font-size:25px;font-weight:800;letter-spacing:-.5px}.brand span{color:#54aafa}.subtitle{margin-top:5px;color:#bdd1e8;font-size:9px;font-weight:700;letter-spacing:1.4px;text-transform:uppercase}.head h1{margin:19px 0 0;font-size:33px;line-height:1.02;letter-spacing:-1.2px}.contact{align-self:end;border-left:1px solid #ffffff33;padding-left:20px;color:#d6e2ef;font-size:10px}.contact strong{display:block;margin-bottom:7px;color:#fff;font-size:11px}.contact div{margin-top:5px}.body{display:grid;grid-template-columns:1.13fr .87fr;gap:22px;padding:22px 32px 26px}.section{margin-bottom:17px}.label{margin-bottom:7px;color:var(--blue);font-size:8px;font-weight:800;letter-spacing:1.4px;text-transform:uppercase}.section h2{margin:0 0 7px;font-size:17px;line-height:1.12}.section p{margin:0;color:var(--muted)}.capabilities{display:grid;grid-template-columns:1fr 1fr;border:1px solid var(--line)}.capabilities div{padding:8px 9px;border-bottom:1px solid var(--line);font-size:10px;font-weight:700}.capabilities div:nth-child(odd){border-right:1px solid var(--line)}.chips{display:flex;flex-wrap:wrap;gap:5px}.chip{border:1px solid var(--line);border-radius:3px;padding:4px 6px;font-size:9px;font-weight:700}.diff{margin:0;padding:0;list-style:none}.diff li{position:relative;margin:0 0 7px;padding-left:13px;color:var(--muted)}.diff li:before{content:'—';position:absolute;left:0;color:var(--blue)}.codes{border-top:2px solid var(--navy)}.code-row{display:grid;grid-template-columns:72px 1fr;gap:8px;padding:6px 0;border-bottom:1px solid var(--line)}.code-row strong{font-size:9px}.code-row span{color:var(--muted);font-size:9px}.experience{padding:9px 0;border-top:1px solid var(--line)}.experience h3{margin:0 0 4px;font-size:11px}.experience p{font-size:9px}.notice{padding:8px;border:1px solid var(--line);background:#f4f7fa;color:var(--muted);font-size:8px}.footer{display:flex;justify-content:space-between;border-top:1px solid var(--line);padding:10px 32px;color:var(--muted);font-size:8px}
        @page{size:Letter;margin:0}@media print{body{background:#fff}.toolbar{display:none}.sheet{margin:0;box-shadow:none;width:8.5in;height:11in;overflow:hidden}}
        @media(max-width:850px){.sheet{width:100%;min-height:0}.head,.body{grid-template-columns:1fr}.contact{border-left:0;border-top:1px solid #ffffff33;padding:14px 0 0}.capabilities{grid-template-columns:1fr}.capabilities div:nth-child(odd){border-right:0}}
    </style>
</head>
<body>
@php
    $identifiers = array_filter([
        'D-U-N-S' => config('services.contracting.duns'),
        'UEI' => config('services.contracting.uei'),
        'Maine Vendor Code' => config('services.contracting.maine_vendor_code'),
        'CAGE Code' => config('services.contracting.cage_code'),
    ], fn ($value) => filled($value));
@endphp
<div class="toolbar"><a href="{{ asset('documents/build-with-abdallah-capability-statement.pdf') }}" download>Download PDF</a><button type="button" onclick="window.print()">Save / Print Current Version</button><a href="{{ route('government') }}">Government Capabilities</a></div>
<main class="sheet">
    <header class="head">
        <div><div class="brand">Build With <span>Abdallah</span></div><div class="subtitle">Software Development · IT Consulting · Maine</div><h1>Capability<br>Statement</h1></div>
        <div class="contact"><strong>Abdallah Mohamed</strong><div>Founder &amp; Lead Software Engineer</div><div>Maine, United States</div><div>buildwithabdallah@gmail.com</div><div>www.buildwithabdallah.com</div></div>
    </header>
    <div class="body">
        <div>
            <section class="section"><div class="label">Company overview</div><h2>Founder-led software engineering for operational systems.</h2><p>Build With Abdallah is a Maine-based software development and IT consulting business that builds, integrates, modernizes and supports maintainable applications. Capabilities span modern web software, legacy systems, enterprise data, manufacturing applications, quality systems and device-connected workflows.</p></section>
            <section class="section"><div class="label">Core capabilities</div><div class="capabilities">@foreach (['Custom software development','Legacy application modernization','Manufacturing & shop-floor systems','Database & API integration','Quality & device integration','Production application support','Data transformation & automation','Technical documentation & handoff'] as $item)<div>{{ $item }}</div>@endforeach</div></section>
            <section class="section"><div class="label">Selected project experience</div>
                <div class="experience"><h3>Legacy Manufacturing Modernization</h3><p>Analysis and incremental modernization of aging desktop workflows using VB / VB.NET, Laravel and SQL Server while preserving validated business logic.</p></div>
                <div class="experience"><h3>Enterprise / SOAP Integration</h3><p>Integration workflows spanning REST and SOAP services, XML / JSON, SQL Server, transformation, automation and production troubleshooting.</p></div>
                <div class="experience"><h3>Quality &amp; Device Integration</h3><p>Experience integrating InfinityQS ProFicient, measurement-data workflows, RS-232 equipment, acquisition services, SQL Server and automation.</p></div>
            </section>
            <div class="notice">Project experience is summarized and anonymized to protect confidential organizational, system and implementation information. InfinityQS experience does not imply affiliation, certification or authorized-partner status.</div>
        </div>
        <aside>
            <section class="section"><div class="label">Differentiators</div><ul class="diff"><li>Direct access to the engineer responsible for architecture and implementation.</li><li>Experience from physical equipment and local services through databases, enterprise integration and web applications.</li><li>Incremental modernization that preserves proven business logic where appropriate.</li><li>Maintainable source code, documentation and operational handoff.</li><li>Maine-based and available throughout the United States.</li></ul></section>
            <section class="section"><div class="label">Technologies</div><div class="chips">@foreach (['PHP 8.x','Laravel','Python','C#','VB.NET','SQL Server','PostgreSQL','REST','SOAP','XML / JSON','RS-232 / COM','TCP/IP','Linux','AWS','Docker'] as $item)<span class="chip">{{ $item }}</span>@endforeach</div></section>
            <section class="section"><div class="label">Industries served</div><p>Government · Municipalities · Education · Manufacturing · Established businesses · Organizations with legacy applications</p></section>
            <section class="section codes"><div class="label" style="margin-top:9px">Contracting information</div>
                <div class="code-row"><strong>Business</strong><span>Build With Abdallah · Sole Proprietorship</span></div>
                <div class="code-row"><strong>NAICS 541511</strong><span>Custom Computer Programming Services</span></div>
                <div class="code-row"><strong>NAICS 541512</strong><span>Computer Systems Design Services</span></div>
                <div class="code-row"><strong>NAICS 541519</strong><span>Other Computer Related Services</span></div>
                @foreach ($identifiers as $name => $value)<div class="code-row"><strong>{{ $name }}</strong><span>{{ $value }}</span></div>@endforeach
            </section>
            <section class="section"><div class="label">Engagement models</div><p>Project-based · Milestone-based · Statement of Work · Subcontracting / prime-contractor support · Ongoing application support</p></section>
        </aside>
    </div>
    <footer class="footer"><span>BUILDWITHABDALLAH.COM</span><span>SOFTWARE BUILT AROUND REAL OPERATIONAL REQUIREMENTS</span></footer>
</main>
</body>
</html>
