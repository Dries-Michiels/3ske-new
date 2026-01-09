@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h2 class="text-2xl font-bold mb-6">Edit FAQ Category</h2>

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.faq-categories.update', $faqCategory) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-300">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $faqCategory->name) }}" class="mt-1 block w-full rounded-md border-neutral-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t mt-6">
                            <a href="{{ route('admin.faq-categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-neutral-600 rounded-lg font-semibold text-gray-300 hover:bg-gray-300 transition duration-200">
                                ← Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-200 text-black font-bold rounded-lg shadow-lg hover:shadow-xl transition duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
