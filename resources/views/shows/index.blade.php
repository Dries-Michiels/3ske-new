@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Shows</h1>
    
    <!-- Tag Filter -->
    @if($allTags->count() > 0)
        <div class="mb-8">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('shows.index') }}" class="px-4 py-2 rounded {{ !$selectedTag ? 'bg-gray-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} border border-gray-300">
                    All
                </a>
                @foreach($allTags as $tag)
                    <a href="{{ route('shows.index', ['tag' => $tag->slug]) }}" class="px-4 py-2 rounded {{ $selectedTag === $tag->slug ? 'bg-gray-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }} border border-gray-300">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    
    <!-- Upcoming Events -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Upcoming Events</h2>
        
        @if($upcomingEvents->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingEvents as $event)
                    <a href="{{ route('shows.show', $event->slug) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                No poster
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                            <div class="text-sm text-gray-600 mb-1">
                                <span class="font-medium">📅</span> {{ $event->starts_at->format('M d, Y - H:i') }}@if($event->ends_at) - {{ $event->ends_at->format('H:i') }}@endif
                            </div>
                            <div class="text-sm text-gray-600 mb-2">
                                <span class="font-medium">📍</span> {{ $event->location }}
                            </div>
                            @if($event->tags->count() > 0)
                                <div class="flex flex-wrap gap-1 mb-2">
                                    @foreach($event->tags as $tag)
                                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                            @if($event->ticket_url)
                                <div class="mt-3">
                                    <span class="inline-block px-3 py-1 bg-gray-800 text-white text-xs font-semibold rounded">
                                        Tickets Available
                                    </span>
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-gray-600">No upcoming events scheduled.</p>
            </div>
        @endif
    </div>

    <!-- Past Events -->
    <div>
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Past Events</h2>
        
        @if($pastEvents->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($pastEvents as $event)
                    <a href="{{ route('shows.show', $event->slug) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden opacity-75 hover:opacity-100">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover grayscale">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                No poster
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                            <div class="text-sm text-gray-600 mb-1">
                                <span class="font-medium">📅</span> {{ $event->starts_at->format('M d, Y - H:i') }}@if($event->ends_at) - {{ $event->ends_at->format('H:i') }}@endif
                            </div>
                            <div class="text-sm text-gray-600 mb-2">
                                <span class="font-medium">📍</span> {{ $event->location }}
                            </div>
                            @if($event->tags->count() > 0)
                                <div class="flex flex-wrap gap-1">
                                    @foreach($event->tags as $tag)
                                        <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded">{{ $tag->name }}</span>
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
@endsection
