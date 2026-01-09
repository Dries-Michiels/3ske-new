<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Toggle favorite status for an event.
     */
    public function toggle(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->hasFavorited($event)) {
            $user->favorites()->detach($event->id);
            $favorited = false;
            $message = 'Removed from favorites';
        } else {
            $user->favorites()->attach($event->id);
            $favorited = true;
            $message = 'Added to favorites';
        }

        // If it's an AJAX request, return JSON
        if (request()->ajax()) {
            return response()->json([
                'favorited' => $favorited,
                'message' => $message,
                'count' => $event->favoritesCount(),
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Show user's favorite events.
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $favorites = $user->favorites()
            ->with('tags')
            ->orderBy('starts_at', 'desc')
            ->paginate(12);

        return view('favorites.index', compact('favorites'));
    }
}
