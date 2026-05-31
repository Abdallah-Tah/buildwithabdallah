<x-mail::message>
# Welcome aboard{{ $name ? ', ' . $name : '' }} 👋

Thanks for subscribing to **Build With Abdallah**.

You'll get practical software, AI agents, automation and API tips — plus a heads-up whenever I publish a new article. No fluff, no spam.

<x-mail::button :url="config('app.url')">
Explore the Journal
</x-mail::button>

Talk soon,
**Abdallah**

<x-mail::subcopy>
You're receiving this because you subscribed at {{ config('app.url') }}.
If this wasn't you, [unsubscribe here]({{ $unsubscribeUrl }}).
</x-mail::subcopy>
</x-mail::message>
