<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReply;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactMessagesController extends Controller
{
    public function index(Request $request): View
    {
        $query = ContactMessage::query()->orderBy('created_at', 'desc');
        
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        
        $messages = $query->paginate(20);
        
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage): View
    {
        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function updateStatus(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,read,replied,archived',
        ]);

        $contactMessage->update($validated);

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function reply(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $validated = $request->validate([
            'reply_message' => 'required|string|max:5000',
        ]);

        // Send reply email
        Mail::to($contactMessage->email)->send(new ContactMessageReply($contactMessage, $validated['reply_message']));

        // Update status
        $contactMessage->update([
            'status' => 'replied',
            'replied_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Reply sent successfully');
    }
}
