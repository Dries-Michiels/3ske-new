<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmation;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'is_booking' => 'boolean',
            'message' => 'required|string|max:5000',
        ]);

        $message = ContactMessage::create($validated);

        // Send confirmation email to the sender
        Mail::to($message->email)->send(new ContactConfirmation($message));

        // Send notification email to admin
        $adminEmail = config('mail.admin_email', 'admin@example.com');
        Mail::to($adminEmail)->send(new ContactMessageReceived($message));

        return redirect()->route('contact')->with('success', 'Thank you for your message! We\'ll get back to you soon.');
    }
}
