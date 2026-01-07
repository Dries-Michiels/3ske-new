@extends('layouts.public')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('shows.index') }}" class="text-gray-600 hover:text-gray-900">
            ← Back to Shows
        </a>
    </div>

    <!-- Event Header -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        @if($event->image_path)
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="w-full h-96 object-cover">
        @endif

        <div class="p-8">
            <!-- Title and Status -->
            <div class="mb-4">
                <div class="flex items-start justify-between">
                    <h1 class="text-4xl font-bold text-gray-900">{{ $event->title }}</h1>
                    @if($event->isUpcoming())
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold rounded-full">
                            Upcoming
                        </span>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm font-semibold rounded-full">
                            Past Event
                        </span>
                    @endif
                </div>
            </div>

            <!-- Tags -->
            @if($event->tags->count() > 0)
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($event->tags as $tag)
                            <a href="{{ route('shows.index', ['tag' => $tag->slug]) }}" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded hover:bg-gray-200">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Event Details -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <div class="flex items-center text-gray-700 mb-3">
                        <span class="text-2xl mr-3">📅</span>
                        <div>
                            <div class="font-semibold">Date & Time</div>
                            <div>{{ $event->starts_at->format('l, F j, Y') }}</div>
                            <div>
                                {{ $event->starts_at->format('H:i') }}
                                @if($event->ends_at)
                                    - {{ $event->ends_at->format('H:i') }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center text-gray-700 mb-3">
                        <span class="text-2xl mr-3">📍</span>
                        <div>
                            <div class="font-semibold">Location</div>
                            <div>{{ $event->location }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket Button -->
            @if($event->ticket_url && $event->isUpcoming())
                <div class="mb-6">
                    <a href="{{ $event->ticket_url }}" target="_blank" class="inline-block px-6 py-3 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors">
                        🎟️ Get Tickets
                    </a>
                </div>
            @endif

            <!-- Description -->
            @if($event->description)
                <div class="border-t pt-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">About This Event</h2>
                    <div class="text-gray-700 leading-relaxed">
                        @foreach(explode("\n", $event->description) as $paragraph)
                            @if(trim($paragraph))
                                <p class="mb-3">{{ $paragraph }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
