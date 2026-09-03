<x-mail::message>
# New contact message

**From:** {{ $contact->name }} &lt;{{ $contact->email }}&gt;<br>
**Organization:** {{ $contact->organization }}<br>
**Phone:** {{ $contact->phone ?: 'Not provided' }}<br>
**Project type:** {{ $contact->project_type }}<br>
**Timeline:** {{ $contact->timeline }}

<x-mail::panel>
{{ $contact->message }}
</x-mail::panel>

<x-mail::button :url="'mailto:' . $contact->email">
Reply to {{ $contact->name }}
</x-mail::button>

<x-mail::subcopy>
Received {{ $contact->created_at->format('M d, Y · H:i') }} via {{ config('app.url') }}/contact.
You can also reply directly to this email.
</x-mail::subcopy>
</x-mail::message>
