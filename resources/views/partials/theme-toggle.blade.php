{{-- Theme toggle: cycles Auto → Light → Dark. Active icon is chosen by CSS
     off html[data-theme]; click handling lives in resources/js/app.js. --}}
<button type="button" data-theme-toggle aria-label="Toggle theme"
        title="Toggle theme (Auto / Light / Dark)"
        class="inline-flex items-center justify-center rounded-sm border border-line hover:border-lineH bg-surface/40 hover:bg-elev/60 p-2.5 text-ink2 hover:text-ink transition">
    {{-- Auto (system) --}}
    <svg class="ti ti-auto h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
        <rect x="3" y="4" width="18" height="13" rx="1.5"/>
        <path stroke-linecap="round" d="M8 21h8M12 17v4"/>
    </svg>
    {{-- Light (sun) --}}
    <svg class="ti ti-light h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
        <circle cx="12" cy="12" r="4"/>
        <path stroke-linecap="round" d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"/>
    </svg>
    {{-- Dark (moon) --}}
    <svg class="ti ti-dark h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
    </svg>
</button>
