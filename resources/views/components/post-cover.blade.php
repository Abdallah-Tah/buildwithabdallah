@props([
    'post',
    'aspect' => 'aspect-[16/10]',
    'letter' => 'text-6xl',
])

@php
    $cover = $post->cover_image ?? null;
    $src = null;
    if ($cover) {
        if (\Illuminate\Support\Str::startsWith($cover, ['http://', 'https://', '/'])) {
            $src = $cover;                                   // absolute URL or root-relative path
        } elseif (file_exists(public_path($cover))) {
            $src = asset($cover);                            // file served directly from /public (e.g. uploads/…)
        } else {
            $src = \Illuminate\Support\Facades\Storage::url($cover); // Filament public-disk upload (e.g. covers/…)
        }
    }
@endphp

<div {{ $attributes->merge(['class' => "relative $aspect overflow-hidden"]) }}>
    @if($src)
        {{-- Real cover image --}}
        <img src="{{ $src }}" alt="{{ $post->title }}" loading="lazy" decoding="async"
             class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-[1.04]" />
        {{-- Legibility wash so badges + edges stay readable --}}
        <div class="absolute inset-0 bg-gradient-to-t from-bg/85 via-bg/15 to-transparent"></div>
        <div class="absolute inset-0 ring-1 ring-inset ring-line/40"></div>
    @else
        {{-- Elegant lettered placeholder --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#0a0e1a] via-[#0e0e10] to-[#0a0a0a]"></div>
        <div class="absolute inset-0 bg-grid-dark bg-grid-sm opacity-30"></div>
        <span class="absolute inset-0 flex items-center justify-center font-display {{ $letter }} text-ink/40">{{ strtoupper(substr($post->title, 0, 1)) }}</span>
    @endif

    {{ $slot }}
</div>
