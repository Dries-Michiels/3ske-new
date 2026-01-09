@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-white mb-8">My Favorite Shows</h1>
    
    @if($favorites->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($favorites as $event)
                <div class="bg-neutral-800 rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden border border-neutral-700 relative">
                    <a href="{{ route('shows.show', $event->slug) }}" class="block">
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
                                <div class="flex flex-wrap gap-1 mb-2">
                                    @foreach($event->tags as $tag)
                                        <span class="px-2 py-1 bg-neutral-700 text-gray-200 text-xs rounded border border-neutral-600">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            @if($event->isUpcoming())
                                <div class="mt-2">
                                    <span class="inline-block px-2 py-1 bg-green-600 text-white text-xs font-semibold rounded">
                                        Upcoming
                                    </span>
                                </div>
                            @else
                                <div class="mt-2">
                                    <span class="inline-block px-2 py-1 bg-neutral-600 text-gray-300 text-xs font-semibold rounded">
                                        Past Event
                                    </span>
                                </div>
                            @endif
                        </div>
                    </a>
                    
                    <!-- Remove Favorite Button -->
                    <button 
                        data-event-id="{{ $event->id }}"
                        class="favorite-btn absolute top-2 right-2 p-2 rounded-full bg-red-500 text-white hover:scale-110 transition-all z-10"
                        aria-label="Remove from favorites">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($favorites->hasPages())
            <div class="mt-8">
                {{ $favorites->links() }}
            </div>
        @endif
    @else
        <div class="bg-neutral-800 rounded-lg shadow p-8 border border-neutral-700 text-center">
            <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
            <h3 class="text-xl font-semibold text-white mb-2">No favorites yet</h3>
            <p class="text-gray-300 mb-4">Start adding shows to your favorites to keep track of events you're interested in!</p>
            <a href="{{ route('shows.index') }}" class="inline-block px-6 py-3 bg-white text-black font-semibold rounded hover:bg-gray-200 transition">
                Browse Shows
            </a>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.favorite-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
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
        // Reload the page to update the list
        window.location.reload();
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
