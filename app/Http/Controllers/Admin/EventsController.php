<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function index(): View
    {
        $events = Event::orderBy('starts_at', 'desc')->paginate(15);
        
        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        $tags = Tag::orderBy('name')->get();
        
        return view('admin.events.create', compact('tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug',
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after:starts_at',
            'location' => 'required|string|max:255',
            'ticket_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('events', 'public');
        }

        $event = Event::create($validated);
        
        $event->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
    }

    public function edit(Event $event): View
    {
        $event->load('tags'); // Eager load tags to prevent N+1 query
        $tags = Tag::orderBy('name')->get();
        
        return view('admin.events.edit', compact('event', 'tags'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug,' . $event->id,
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after:starts_at',
            'location' => 'required|string|max:255',
            'ticket_url' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);
        
        $event->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
    }
}
