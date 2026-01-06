@extends('layouts.public')

@section('content')
<div class="min-h-screen bg-gray-50 py-8 md:py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('news.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to all news
            </a>
        </div>

        <!-- Article Card -->
        <article class="bg-white shadow-2xl rounded-3xl overflow-hidden">
            @if($newsPost->image_path)
                <div class="relative h-72 md:h-96 w-full overflow-hidden">
                    <img src="{{ asset('storage/' . $newsPost->image_path) }}" alt="{{ $newsPost->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
            @endif
            
            <div class="px-6 py-8 md:px-12 md:py-12 lg:px-16 lg:py-16">
                <!-- Title -->
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    {{ $newsPost->title }}
                </h1>
                
                <!-- Meta Information -->
                <div class="flex items-center text-gray-500 mb-10 pb-8 border-b-2 border-gray-100">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <time datetime="{{ $newsPost->published_at->toISOString() }}" class="text-sm font-semibold">
                        {{ $newsPost->published_at->format('F j, Y \a\t g:i A') }}
                    </time>
                </div>
                
                <!-- Content with proper paragraph spacing -->
                <div class="text-gray-800 leading-relaxed text-lg space-y-4">
                    @foreach(explode("\n", $newsPost->content) as $paragraph)
                        @if(trim($paragraph) !== '')
                            <p class="mb-4">{{ $paragraph }}</p>
                        @else
                            <div class="h-4"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </article>

        <!-- Bottom Navigation -->
        <div class="mt-12 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-3xl p-8 text-center border-2 border-indigo-100">
            <a href="{{ route('news.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white text-base font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                View All News Articles
            </a>
        </div>
    </div>
</div>
@endsection
