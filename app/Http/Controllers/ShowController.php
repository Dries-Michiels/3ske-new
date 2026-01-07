<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends Controller
{
    public function index(): View
    {
        $upcomingEvents = Event::where('starts_at', '>=', now())
            ->orderBy('starts_at', 'asc')
            ->get();

        $pastEvents = Event::where('starts_at', '<', now())
            ->orderBy('starts_at', 'desc')
            ->get();

        return view('shows.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function show(string $slug): View
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        return view('shows.show', compact('event'));
    }
}
