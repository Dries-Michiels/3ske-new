@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h2 class="text-2xl font-bold mb-6">Create News Post</h2>

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-300">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <p class="mt-1 text-sm text-gray-400">URL-friendly version of title (e.g., my-news-post)</p>
                        </div>

                        <div class="mb-4">
                            <label for="published_at" class="block text-sm font-medium text-gray-300">Published At</label>
                            <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-300">Image</label>
                            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-neutral-700">
                            <p class="mt-1 text-sm text-gray-400">Max 2MB, JPG/PNG</p>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-300">Content</label>
                            <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t mt-6">
                            <a href="{{ route('admin.news.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-neutral-600 rounded-lg font-semibold text-gray-300 hover:bg-gray-300 transition duration-200">
                                ← Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-200 text-black font-bold rounded-lg shadow-lg hover:shadow-xl transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
