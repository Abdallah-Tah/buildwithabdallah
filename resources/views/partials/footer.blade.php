<footer class="border-t border-white/10 bg-slate-950/80">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-[1.2fr_0.8fr_0.8fr] lg:px-8">
        <div>
            <h2 class="text-lg font-semibold text-white">Build With Abdallah</h2>
            <p class="mt-3 max-w-xl text-sm leading-7 text-slate-400">
                Professional software, automation, APIs, tutorials, and practical solutions for real businesses.
            </p>
        </div>
        <div>
            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-300">Explore</h3>
            <div class="mt-4 space-y-2 text-sm text-slate-400">
                <a href="{{ route('services') }}" class="footer-link">Services</a>
                <a href="{{ route('tutorials.index') }}" class="footer-link">Tutorials</a>
                <a href="{{ route('videos.index') }}" class="footer-link">Videos</a>
            </div>
        </div>
        <div>
            <h3 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-300">Contact</h3>
            <div class="mt-4 space-y-2 text-sm text-slate-400">
                <p>Available for MVPs, internal tools, dashboards, and API projects.</p>
                <a href="{{ route('contact.index') }}" class="footer-link">Send a message</a>
            </div>
        </div>
    </div>
</footer>
