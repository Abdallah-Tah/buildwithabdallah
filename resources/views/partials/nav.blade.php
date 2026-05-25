<nav x-data="{ open: false }" @keydown.escape.window="open = false" class="sticky top-0 z-50 border-b border-brand-gray/80 bg-white/92 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3">
            <img src="{{ asset('brand/logo.jpg') }}" alt="Build With Abdallah logo" class="h-9 w-9 rounded-lg object-contain sm:h-10 sm:w-10">
            <div class="min-w-0">
                <div class="truncate text-[15px] font-semibold tracking-tight text-brand-navy sm:text-base">Build With Abdallah</div>
                <div class="truncate text-[11px] text-slate-500 sm:text-xs">Software • Automation • APIs • Solutions</div>
            </div>
        </a>

        <div class="hidden items-center gap-7 lg:flex">
            <a href="{{ route('about') }}" class="nav-link">About</a>
            <a href="{{ route('services') }}" class="nav-link">Services</a>
            <a href="{{ route('tutorials.index') }}" class="nav-link">Tutorials</a>
            <a href="{{ route('videos.index') }}" class="nav-link">Videos</a>
            <a href="{{ route('newsletter.index') }}" class="nav-link">Newsletter</a>
            <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
            <a href="{{ url('/admin') }}" class="inline-flex items-center rounded-full bg-brand-blue px-4 py-2 text-sm font-semibold text-white shadow-sm shadow-blue-200 transition hover:bg-blue-700">Admin</a>
        </div>

        <button @click="open = !open" type="button" aria-label="Toggle navigation" class="inline-flex rounded-xl border border-brand-gray bg-white p-2 text-brand-navy lg:hidden">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <div x-cloak x-show="open" x-transition.origin.top class="border-t border-brand-gray bg-white lg:hidden">
        <div class="mx-auto max-w-7xl space-y-1 px-4 py-4 sm:px-6">
            <a href="{{ route('about') }}" class="mobile-nav-link">About</a>
            <a href="{{ route('services') }}" class="mobile-nav-link">Services</a>
            <a href="{{ route('tutorials.index') }}" class="mobile-nav-link">Tutorials</a>
            <a href="{{ route('videos.index') }}" class="mobile-nav-link">Videos</a>
            <a href="{{ route('newsletter.index') }}" class="mobile-nav-link">Newsletter</a>
            <a href="{{ route('contact.index') }}" class="mobile-nav-link">Contact</a>
            <a href="{{ url('/admin') }}" class="mobile-nav-link">Admin</a>
        </div>
    </div>
</nav>
