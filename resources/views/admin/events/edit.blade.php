@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white">Edit Event</h2>
        <a href="{{ route('admin.events.index') }}" class="text-gray-300 hover:text-white">← Back to Events</a>
    </div>

    <div class="bg-neutral-800 shadow rounded-lg p-6">
        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-300">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $event->slug) }}" required
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1 text-sm text-gray-400">URL-friendly version (e.g., summer-festival-2024)</p>
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="starts_at" class="block text-sm font-medium text-gray-300">Start Date & Time</label>
                <input type="datetime-local" name="starts_at" id="starts_at" value="{{ old('starts_at', $event->starts_at->format('Y-m-d\\TH:i')) }}" required
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('starts_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="ends_at" class="block text-sm font-medium text-gray-300">End Date & Time (Optional)</label>
                <input type="datetime-local" name="ends_at" id="ends_at" value="{{ old('ends_at', $event->ends_at?->format('Y-m-d\\TH:i')) }}"
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1 text-sm text-gray-400">Tot wanneer je moet draaien</p>
                @error('ends_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-300">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" required
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('location')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="ticket_url" class="block text-sm font-medium text-gray-300">Ticket URL (Optional)</label>
                <input type="url" name="ticket_url" id="ticket_url" value="{{ old('ticket_url', $event->ticket_url) }}"
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="https://tickets.example.com/event">
                @error('ticket_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Tags (Optional)</label>
                @if($tags->count() > 0)
                    <div class="space-y-2">
                        @foreach($tags as $tag)
                            <label class="inline-flex items-center mr-4">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $event->tags->pluck('id')->toArray())) ? 'checked' : '' }}
                                    class="rounded border-neutral-600 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-300">{{ $tag->name }}</span>
                            </label>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400">No tags available. <a href="{{ route('admin.tags.create') }}" class="text-indigo-600 hover:text-indigo-900">Create tags first</a>.</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-300">Event Poster</label>
                
                @if($event->image_path)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="h-32 w-32 object-cover rounded">
                        <p class="text-sm text-gray-400 mt-1">Current poster</p>
                    </div>
                @endif

                <input type="file" name="image" id="image" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-700">
                <p class="mt-1 text-sm text-gray-400">Leave empty to keep current poster. Max 2MB.</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-300">Description (Optional)</label>
                <textarea name="description" id="description" rows="6"
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.events.index') }}" class="px-4 py-2 border border-neutral-600 rounded hover:bg-neutral-700">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-700">
                    Update Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
