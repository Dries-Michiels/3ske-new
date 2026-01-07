<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function index(Request $request): View
    {
        $query = Event::query();
        
        // Filter by tag if provided
        if ($request->has('tag')) {
            $tag = Tag::where('slug', $request->tag)->firstOrFail();
            $query->whereHas('tags', function($q) use ($tag) {
                $q->where('tags.id', $tag->id);
            });
        }
        
        $upcomingEvents = (clone $query)->where('starts_at', '>=', now())
            ->with('tags')
            ->orderBy('starts_at', 'asc')
            ->get();

        $pastEvents = (clone $query)->where('starts_at', '<', now())
            ->with('tags')
            ->orderBy('starts_at', 'desc')
            ->get();
            
        $allTags = Tag::has('events')->orderBy('name')->get();
        $selectedTag = $request->tag;

        return view('shows.index', compact('upcomingEvents', 'pastEvents', 'allTags', 'selectedTag'));
    }

    public function show(string $slug): View
    {
        $event = Event::with('tags')->where('slug', $slug)->firstOrFail();

        return view('shows.show', compact('event'));
    }
}
