@extends('layouts.public')

@section('content')
<div class="min-h-screen bg-neutral-900 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Frequently Asked Questions</h1>
            <p class="text-xl text-gray-300">Find answers to common questions</p>
        </div>

        @if($categories->count() > 0)
            <div class="space-y-8">
                @foreach($categories as $category)
                    @if($category->faqItems->count() > 0)
                        <div class="bg-neutral-800 rounded-2xl shadow-xl overflow-hidden border border-neutral-700" x-data="{ open: false }">
                            <!-- Category Header - Clickable -->
                            <button @click="open = !open" class="w-full bg-white px-6 py-4 flex items-center justify-between hover:bg-gray-200 transition duration-200">
                                <h2 class="text-2xl font-bold text-black">{{ $category->name }}</h2>
                                <svg x-show="!open" class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                <svg x-show="open" class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                </svg>
                            </button>
                            
                            <!-- FAQ Items - Collapsible -->
                            <div x-show="open" x-collapse>
                                <div class="divide-y divide-neutral-700">
                                    @foreach($category->faqItems as $item)
                                        <div class="p-6 hover:bg-neutral-700 transition duration-200">
                                            <h3 class="text-lg font-bold text-white mb-3 flex items-start">
                                                <svg class="w-6 h-6 text-white mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $item->question }}
                                            </h3>
                                            <div class="text-gray-300 leading-relaxed ml-8">
                                                @foreach(explode("\n", $item->answer) as $paragraph)
                                                    @if(trim($paragraph) !== '')
                                                        <p class="mb-2">{{ $paragraph }}</p>
                                                    @else
                                                        <div class="h-2"></div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="bg-neutral-800 shadow-xl rounded-2xl p-12 text-center border border-neutral-700">
                <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-xl text-gray-300">No FAQs available at the moment. Check back soon!</p>
            </div>
        @endif
    </div>
</div>
@endsection
