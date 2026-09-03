<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $pageTitle = $title ?? 'Build With Abdallah | Software Development & IT Consulting';
        $pageDescription = $metaDescription ?? 'Maine-based software development and IT consulting company specializing in custom software, legacy modernization, APIs, databases, automation, system integration and application support.';
        $ogImage = $ogImage ?? asset('brand/logo.jpg');
        $faviconVersion = file_exists(public_path('favicon.ico')) ? filemtime(public_path('favicon.ico')) : time();
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="facebook-domain-verification" content="2foxpsert5yz43j5jb5yn1u6trbs94">
    {{-- Overwritten by app.js once the resolved theme is known. --}}
    <meta name="theme-color" content="#f5f7fa">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Build With Abdallah">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <script type="application/ld+json">{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => ['Organization', 'ProfessionalService'],
        'name' => 'Build With Abdallah',
        'url' => config('app.url'),
        'logo' => asset('brand/logo.jpg'),
        'description' => $pageDescription,
        'founder' => ['@type' => 'Person', 'name' => 'Abdallah Mohamed', 'jobTitle' => 'Founder & Lead Software Engineer'],
        'areaServed' => ['Maine', 'United States'],
        'address' => ['@type' => 'PostalAddress', 'addressRegion' => 'Maine', 'addressCountry' => 'US'],
        'sameAs' => ['https://github.com/Abdallah-Tah', 'https://www.linkedin.com/in/abdallahmohamed86/'],
    ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}" sizes="any">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}?v={{ $faviconVersion }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}?v={{ $faviconVersion }}">

    {{-- Resolve the theme before first paint so the page never flashes.
         Defaults to 'auto' so we follow the visitor's OS preference; an
         explicit choice via the nav toggle is remembered in localStorage. --}}
    <script>
        (() => {
            const KEY = 'bwa.theme';
            const stored = (() => { try { return localStorage.getItem(KEY); } catch { return null; } })();
            const t = ['auto', 'light', 'dark'].includes(stored) ? stored : 'auto';
            const dark = t === 'dark' || (t === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);
            const el = document.documentElement;
            el.classList.toggle('dark', dark);
            el.dataset.theme = t;
            el.dataset.resolvedTheme = dark ? 'dark' : 'light';
        })();
    </script>

    {{-- Geometric type pairing (Space Grotesk display / Manrope body) — chosen
         to avoid the generic system-ui / Inter look. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&amp;family=Manrope:wght@400;500;600;700;800&amp;family=Space+Grotesk:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    @php($gaMeasurementId = config('services.ga.measurement_id'))
    @if (app()->environment('production') && filled($gaMeasurementId))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaMeasurementId }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', @json($gaMeasurementId));
        </script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-bg text-ink font-sans antialiased">
    <a href="#main"
       class="sr-only focus:not-sr-only focus:absolute focus:left-3 focus:top-3 focus:z-100 focus:rounded-sm focus:bg-brand-500 focus:px-4 focus:py-3 focus:font-semibold focus:text-brand-ink">
        Skip to content
    </a>

    @include('partials.nav')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.footer')
    @stack('scripts')
</body>
</html>
