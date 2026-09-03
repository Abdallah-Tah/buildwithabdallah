@props(['name'])

@php
    $paths = [
        'software' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M7 6.5h.01M10 6.5h.01M8 14l2 2 5-5"/>',
        'modernize' => '<path d="M20 7h-5V2M4 17h5v5"/><path d="M6.1 8A8 8 0 0 1 20 7l1-1M17.9 16A8 8 0 0 1 4 17l-1 1"/>',
        'integration' => '<path d="M8 12h8M5 8v8M19 8v8"/><circle cx="5" cy="5" r="3"/><circle cx="19" cy="5" r="3"/><circle cx="5" cy="19" r="3"/><circle cx="19" cy="19" r="3"/>',
        'data' => '<ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v7c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 12v7c0 1.7 3.6 3 8 3s8-1.3 8-3v-7"/>',
        'automation' => '<path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1"/><circle cx="12" cy="12" r="4"/>',
        'support' => '<path d="M12 3a8 8 0 0 0-8 8v5a3 3 0 0 0 3 3h2v-7H4M12 3a8 8 0 0 1 8 8v5a3 3 0 0 1-3 3h-2v-7h5M15 19c0 1.1-.9 2-2 2h-2"/>',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex h-11 w-11 items-center justify-center rounded-sm border border-brand-500/20 bg-brand-500/8 text-brand-read']) }}>
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
        {!! $paths[$name] ?? $paths['software'] !!}
    </svg>
</span>
