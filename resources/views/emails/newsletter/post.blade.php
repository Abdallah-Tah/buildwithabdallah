<x-mail::message>
# {{ $post->title }}

@if($post->excerpt)
{{ $post->excerpt }}
@endif

<x-mail::button :url="$url">
Read the full article
</x-mail::button>

— **Abdallah**

<x-mail::subcopy>
You're receiving this because you subscribed to Build With Abdallah.
[Unsubscribe]({{ $unsubscribeUrl }}) anytime.
</x-mail::subcopy>
</x-mail::message>
