@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-neutral-800 shadow-lg rounded-lg overflow-hidden border border-neutral-700">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-neutral-700 to-neutral-600 h-32"></div>
        
        <div class="px-6 py-8">
            <!-- Avatar & Name -->
            <div class="flex items-start -mt-20 mb-6">
                <div class="w-32 h-32 rounded-full border-4 border-neutral-800 bg-neutral-700 overflow-hidden shadow-lg">
                    @if($user->avatar_path)
                        <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-neutral-700 text-gray-300 text-4xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                
                <div class="ml-6 mt-16">
                    <h1 class="text-3xl font-bold text-white">{{ $user->name }}</h1>
                    <p class="text-gray-300">{{ $user->email }}</p>
                    
                    @auth
                        @if(auth()->id() === $user->id)
                            <a href="{{ route('profile.edit') }}" class="mt-3 inline-flex items-center px-4 py-2 bg-white text-black border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-200 transition">
                                Edit Profile
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Profile Info -->
            <div class="space-y-6">
                @if($user->birthday)
                    <div>
                        <h3 class="text-sm font-medium text-gray-400 uppercase">Birthday</h3>
                        <p class="mt-1 text-lg text-white">{{ \Carbon\Carbon::parse($user->birthday)->format('F j, Y') }}</p>
                    </div>
                @endif

                @if($user->bio)
                    <div>
                        <h3 class="text-sm font-medium text-gray-400 uppercase">About</h3>
                        <p class="mt-1 text-gray-300 whitespace-pre-line">{{ $user->bio }}</p>
                    </div>
                @endif

                @if(!$user->birthday && !$user->bio && auth()->id() !== $user->id)
                    <div class="text-center py-8">
                        <p class="text-gray-400">This user hasn't added any profile information yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Favorite Shows -->
    @if($favoriteShows->count() > 0)
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 fill-current text-red-500" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                Favorite Upcoming Shows
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($favoriteShows as $event)
                    <a href="{{ route('shows.show', $event->slug) }}" class="bg-neutral-800 rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden border border-neutral-700">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-neutral-700 flex items-center justify-center text-gray-400">
                                No poster
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-white mb-2">{{ $event->title }}</h3>
                            <div class="text-sm text-gray-300 mb-1">
                                <span class="font-medium">📅</span> {{ $event->starts_at->format('M d, Y - H:i') }}@if($event->ends_at) - {{ $event->ends_at->format('H:i') }}@endif
                            </div>
                            <div class="text-sm text-gray-300 mb-2">
                                <span class="font-medium">📍</span> {{ $event->location }}
                            </div>
                            @if($event->tags->count() > 0)
                                <div class="flex flex-wrap gap-1">
                                    @foreach($event->tags as $tag)
                                        <span class="px-2 py-1 bg-neutral-700 text-gray-200 text-xs rounded border border-neutral-600">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
