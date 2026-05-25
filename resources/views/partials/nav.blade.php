<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/85 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-cyan-500/15 text-lg font-bold text-cyan-300 ring-1 ring-cyan-400/30">BA</div>
            <div>
                <div class="font-semibold tracking-wide text-white">Build With Abdallah</div>
                <div class="text-xs text-slate-400">Software • Automation • APIs</div>
            </div>
        </a>

        <button @click="open = !open" class="inline-flex rounded-xl border border-white/10 p-2 text-slate-200 lg:hidden">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="hidden items-center gap-8 lg:flex">
            <a href="{{ route('about') }}" class="nav-link">About</a>
            <a href="{{ route('services') }}" class="nav-link">Services</a>
            <a href="{{ route('tutorials.index') }}" class="nav-link">Tutorials</a>
            <a href="{{ route('videos.index') }}" class="nav-link">Videos</a>
            <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
            <a href="{{ url('/admin') }}" class="rounded-full border border-cyan-400/30 bg-cyan-400/10 px-4 py-2 text-sm font-semibold text-cyan-200 transition hover:bg-cyan-400/20">Admin</a>
        </div>
    </div>

    <div x-cloak x-show="open" x-transition class="border-t border-white/10 bg-slate-950 lg:hidden">
        <div class="space-y-1 px-4 py-4 sm:px-6">
            <a href="{{ route('about') }}" class="mobile-nav-link">About</a>
            <a href="{{ route('services') }}" class="mobile-nav-link">Services</a>
            <a href="{{ route('tutorials.index') }}" class="mobile-nav-link">Tutorials</a>
            <a href="{{ route('videos.index') }}" class="mobile-nav-link">Videos</a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link">Contact</a>
            <a href="{{ url('/admin') }}" class="mobile-nav-link">Admin</a>
        </div>
    </div>
</nav>
