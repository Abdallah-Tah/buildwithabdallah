<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Build With Abdallah — Ship faster with custom software, AI agents & automation' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Custom Laravel apps, AI agents, Telegram bots, workflow automation and dashboards — built by a senior full-stack engineer with 8+ years in production.' }}">
    <meta name="theme-color" content="#09090b">
    @php($faviconVersion = file_exists(public_path('favicon.ico')) ? filemtime(public_path('favicon.ico')) : time())
    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}" sizes="any">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}?v={{ $faviconVersion }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}?v={{ $faviconVersion }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}?v={{ $faviconVersion }}">

    {{-- Theme initialization (before CSS to prevent flash) --}}
    <script>
        (() => {
            const KEY = 'bwa.theme';
            const mql = window.matchMedia('(prefers-color-scheme: dark)');
            const t = localStorage.getItem(KEY) || 'auto';
            const wantDark = t === 'dark' || (t === 'auto' && mql.matches);
            if (wantDark) document.documentElement.classList.add('dark');
            else document.documentElement.classList.remove('dark');
            document.documentElement.dataset.theme = t;
            document.documentElement.dataset.resolvedTheme = wantDark ? 'dark' : 'light';
            // Persist on system change when set to auto
            mql.addEventListener('change', (e) => {
                if (localStorage.getItem(KEY) === 'auto' || !localStorage.getItem(KEY)) {
                    const w = e.matches;
                    document.documentElement.classList.toggle('dark', w);
                    document.documentElement.dataset.resolvedTheme = w ? 'dark' : 'light';
                }
            });
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-bg text-ink font-sans antialiased">
    {{-- Top Status Strip --}}
    @include('partials.status-strip')

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
