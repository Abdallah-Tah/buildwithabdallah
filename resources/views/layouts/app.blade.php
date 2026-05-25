<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Build With Abdallah' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Full-stack software, AI agents, dashboards, APIs, and automation systems by Abdallah Mohamed.' }}">
    <meta name="theme-color" content="#2563EB">
    @php($faviconVersion = file_exists(public_path('favicon.ico')) ? filemtime(public_path('favicon.ico')) : time())
    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}" sizes="any">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}?v={{ $faviconVersion }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}?v={{ $faviconVersion }}">
    <script>
        (() => {
            const media = window.matchMedia('(prefers-color-scheme: dark)');
            const apply = (isDark) => {
                document.documentElement.classList.toggle('theme-dark', isDark);
                const theme = document.querySelector('meta[name="theme-color"]');
                if (theme) theme.setAttribute('content', isDark ? '#0F172A' : '#2563EB');
            };
            apply(media.matches);
            if (typeof media.addEventListener === 'function') {
                media.addEventListener('change', (event) => apply(event.matches));
            } else if (typeof media.addListener === 'function') {
                media.addListener((event) => apply(event.matches));
            }
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-brand-white text-brand-navy antialiased transition-colors duration-200">
    @include('partials.nav')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
