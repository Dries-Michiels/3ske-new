<x-mail::message>
# New Contact Message{{ $contactMessage->is_booking ? ' - BOOKING REQUEST' : '' }}

You have received a new contact message from your website.

**From:** {{ $contactMessage->name }}  
**Email:** {{ $contactMessage->email }}  
@if($contactMessage->phone)
**Phone:** {{ $contactMessage->phone }}  
@endif
**Type:** {{ $contactMessage->is_booking ? 'Booking Request' : 'General Message' }}  
**Received:** {{ $contactMessage->created_at->format('d M Y H:i') }}

---

**Message:**

{{ $contactMessage->message }}

---

<x-mail::button :url="url('/admin/contact-messages/' . $contactMessage->id)">
View & Reply
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
