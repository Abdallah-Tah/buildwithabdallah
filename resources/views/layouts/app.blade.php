<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Build With Abdallah — Ship faster with custom software, AI agents & automation' }}</title>
  	<meta name="facebook-domain-verification" content="2foxpsert5yz43j5jb5yn1u6trbs94" />
    <meta name="description" content="{{ $metaDescription ?? 'Custom Laravel apps, AI agents, Telegram bots, workflow automation and dashboards — built by a senior full-stack engineer with 8+ years in production.' }}">
    <meta name="theme-color" content="#09090b">
    @php($faviconVersion = file_exists(public_path('favicon.ico')) ? filemtime(public_path('favicon.ico')) : time())
    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}" sizes="any">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}?v={{ $faviconVersion }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}?v={{ $faviconVersion }}">

    {{-- Theme initialization (before CSS to prevent flash).
         Defaults to 'auto' so we follow the visitor's OS preference; an
         explicit choice via the nav toggle is remembered in localStorage. --}}
    <script>
        (() => {
            const KEY = 'bwa.theme';
            const t = localStorage.getItem(KEY) || 'auto';
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
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="{{ asset("css/light-mode-fix.css") }}">
</head>
<body class="min-h-screen bg-bg text-ink font-sans antialiased">
    {{-- Navigation --}}
    @include('partials.nav')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')
</body>
</html>
