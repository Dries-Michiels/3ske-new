<x-mail::message>
# Re: Your Contact Message

Hi {{ $contactMessage->name }},

Thank you for contacting us. Here is our response:

---

{{ $replyMessage }}

---

**Your original message:**

{{ $contactMessage->message }}

---

If you have any further questions, feel free to reply to this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
