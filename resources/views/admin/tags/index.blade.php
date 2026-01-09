@extends('layouts.admin')

@section('title', 'Manage Tags')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-white">Manage Tags</h2>
    <a href="{{ route('admin.tags.create') }}" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-700">
        Create Tag
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Slug</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Events</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-neutral-800 divide-y divide-neutral-700">
            @forelse($tags as $tag)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-white">{{ $tag->name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                        {{ $tag->slug }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                        {{ $tag->events_count }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.tags.edit', $tag) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-400">
                        No tags found. <a href="{{ route('admin.tags.create') }}" class="text-indigo-600 hover:text-indigo-900">Create your first tag</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $tags->links() }}
</div>
</div>
@endsection
