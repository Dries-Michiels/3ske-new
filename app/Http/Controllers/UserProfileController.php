<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        
        // Get user's favorite upcoming shows
        $favoriteShows = $user->favorites()
            ->with('tags')
            ->where('starts_at', '>=', now())
            ->orderBy('starts_at', 'asc')
            ->get();
        
        return view('profiles.show', compact('user', 'favoriteShows'));
    }
}
