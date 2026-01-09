@extends('layouts.admin')

@section('title', 'Manage Events')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-white">Manage Events</h2>
    <a href="{{ route('admin.events.create') }}" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-700">
        Create Event
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-neutral-800 shadow rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-neutral-700">
        <thead class="bg-neutral-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Poster</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Location</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-neutral-800 divide-y divide-neutral-700">
            @forelse($events as $event)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="h-16 w-16 object-cover rounded">
                        @else
                            <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center text-gray-400">
                                No image
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-white">{{ $event->title }}</div>
                        <div class="text-sm text-gray-400">/{{ $event->slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ $event->starts_at->format('M d, Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ $event->location }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($event->isUpcoming())
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Upcoming
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Past
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.events.edit', $event) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-400">
                        No events found. <a href="{{ route('admin.events.create') }}" class="text-indigo-600 hover:text-indigo-900">Create your first event</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $events->links() }}
</div>
</div>
@endsection
