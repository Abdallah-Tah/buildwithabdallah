<footer class="border-t border-brand-gray bg-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 lg:grid-cols-[1.2fr_0.8fr_0.8fr] lg:px-8">
        <div>
            <div class="flex items-center gap-3">
                <img src="{{ asset('brand/logo.png') }}" alt="Build With Abdallah logo" class="h-10 w-10 rounded-xl object-contain">
                <h2 class="text-lg font-semibold text-brand-navy">Build With Abdallah</h2>
            </div>
            <p class="mt-4 max-w-xl text-sm leading-7 text-slate-600">
                Professional software, automation, APIs, tutorials, and business solutions built with a practical engineering mindset.
            </p>
        </div>
        <div>
            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">Explore</h3>
            <div class="mt-4 space-y-2 text-sm text-slate-600">
                <a href="{{ route('services') }}" class="footer-link">Services</a>
                <a href="{{ route('tutorials.index') }}" class="footer-link">Tutorials</a>
                <a href="{{ route('videos.index') }}" class="footer-link">Videos</a>
                <a href="{{ route('newsletter.index') }}" class="footer-link">Newsletter</a>
            </div>
        </div>
        <div>
            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">Contact</h3>
            <div class="mt-4 space-y-2 text-sm text-slate-600">
                <p>Available for dashboards, automation systems, APIs, and MVP builds.</p>
                <a href="{{ route('contact.index') }}" class="footer-link">Start a conversation</a>
            </div>
        </div>
    </div>
</footer>
