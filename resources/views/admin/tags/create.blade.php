@extends('layouts.admin')

@section('title', 'Create Tag')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white">Create Tag</h2>
        <a href="{{ route('admin.tags.index') }}" class="text-gray-300 hover:text-white">← Back to Tags</a>
    </div>

    <div class="bg-neutral-800 shadow rounded-lg p-6">
        <form action="{{ route('admin.tags.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-gray-300">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                    class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <p class="mt-1 text-sm text-gray-400">URL-friendly version (e.g., techno, house, club)</p>
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.tags.index') }}" class="px-4 py-2 border border-neutral-600 rounded hover:bg-neutral-700">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-700">
                    Create Tag
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
