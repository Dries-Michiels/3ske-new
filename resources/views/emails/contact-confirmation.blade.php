<x-mail::message>
# Hey {{ $contactMessage->name }}! 🎧

Thanks for hitting me up! I got your message and I'll get back to you real soon.

@if($contactMessage->is_booking)
Spotted this is a **booking request** 🔥 - I'll check my calendar and hit you back with availability and rates!
@else
I'll check out your message and get back to you as soon as I can.
@endif

---

**Your message:**

{{ $contactMessage->message }}

---

Got any urgent questions? Feel free to reply to this email.

Cheers,<br>
3SKE 🎶
</x-mail::message>
