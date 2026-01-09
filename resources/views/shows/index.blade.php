@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Shows</h1>
        
        @auth
            <a href="{{ route('favorites.index') }}" class="inline-flex items-center px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-white rounded-lg transition border border-neutral-600">
                <svg class="w-5 h-5 mr-2 fill-current text-red-500" viewBox="0 0 24 24">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                My Favorites
            </a>
        @endauth
    </div>
    
    <!-- Tag Filter -->
    @if($allTags->count() > 0)
        <div class="mb-8">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('shows.index') }}" class="px-4 py-2 rounded {{ !$selectedTag ? 'bg-white text-black' : 'bg-neutral-800 text-white hover:bg-neutral-700' }} border border-neutral-600">
                    All
                </a>
                @foreach($allTags as $tag)
                    <a href="{{ route('shows.index', ['tag' => $tag->slug]) }}" class="px-4 py-2 rounded {{ $selectedTag === $tag->slug ? 'bg-white text-black' : 'bg-neutral-800 text-white hover:bg-neutral-700' }} border border-neutral-600">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    
    <!-- Upcoming Events -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-white mb-6">Upcoming Events</h2>
        
        @if($upcomingEvents->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingEvents as $event)
                    <div class="bg-neutral-800 rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden border border-neutral-700 relative">
                        <a href="{{ route('shows.show', $event->slug) }}" class="block">
                            @if($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-slate-700 flex items-center justify-center text-gray-400">
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
                                    <div class="flex flex-wrap gap-1 mb-2">
                                        @foreach($event->tags as $tag)
                                            <span class="px-2 py-1 bg-slate-700 text-gray-200 text-xs rounded border border-slate-600">{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                @if($event->ticket_url)
                                    <div class="mt-3">
                                        <span class="inline-block px-3 py-1 bg-white text-black text-xs font-semibold rounded">
                                            Tickets Available
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </a>
                        
                        <!-- Favorite Button -->
                        @auth
                            <button 
                                data-event-id="{{ $event->id }}"
                                class="favorite-btn absolute top-2 right-2 p-2 rounded-full {{ auth()->user()->hasFavorited($event) ? 'bg-red-500 text-white' : 'bg-neutral-700/80 text-gray-300' }} hover:scale-110 transition-all z-10"
                                aria-label="Favorite">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                            </button>
                        @endauth
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-neutral-800 shadow rounded-lg p-6 border border-neutral-700">
                <p class="text-gray-300">No upcoming events scheduled.</p>
            </div>
        @endif
    </div>

    <!-- Past Events -->
    <div>
        <h2 class="text-2xl font-bold text-white mb-6">Past Events</h2>
        
        @if($pastEvents->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($pastEvents as $event)
                    <a href="{{ route('shows.show', $event->slug) }}" class="bg-neutral-800 rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden opacity-75 hover:opacity-100 border border-neutral-700">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover grayscale">
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
        @else
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-600">No past events to display.</p>
            </div>
        @endif
    </div>
</div>

@auth
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            e.preventDefault();
            const eventId = this.getAttribute('data-event-id');
            toggleFavorite(eventId, this);
        });
    });
});

function toggleFavorite(eventId, button) {
    fetch(`/events/${eventId}/favorite`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.favorited) {
            button.classList.remove('bg-neutral-700/80', 'text-gray-300');
            button.classList.add('bg-red-500', 'text-white');
        } else {
            button.classList.remove('bg-red-500', 'text-white');
            button.classList.add('bg-neutral-700/80', 'text-gray-300');
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endauth
@endsection
