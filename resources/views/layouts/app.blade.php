<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Build With Abdallah' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Software, Automation, APIs, Tutorials, Videos, and Business Solutions.' }}">
    <meta name="theme-color" content="#071427">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="absolute inset-x-0 top-0 -z-10 h-[32rem] bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.22),_transparent_50%)]"></div>
    @include('partials.nav')

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
