@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">News</h1>
    
    @if($newsPosts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($newsPosts as $post)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-4xl">📰</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-500 mb-4">{{ $post->published_at->format('F j, Y') }}</p>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                        <a href="{{ route('news.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Read more →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $newsPosts->links() }}
        </div>
    @else
        <div class="bg-white shadow rounded-lg p-6">
            <p class="text-gray-600">No news articles available at the moment. Check back soon!</p>
        </div>
    @endif
</div>
@endsection
