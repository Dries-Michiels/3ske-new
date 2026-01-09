@extends('layouts.public')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-white mb-8">Contact</h1>
    
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-900 border border-green-700 text-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="bg-neutral-800 shadow rounded-lg p-6 border border-neutral-700">
        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="mt-1 block w-full rounded-md bg-neutral-700 border-neutral-600 text-white shadow-sm focus:border-white focus:ring-white">
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full rounded-md bg-neutral-700 border-neutral-600 text-white shadow-sm focus:border-white focus:ring-white">
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-300">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                    class="mt-1 block w-full rounded-md bg-neutral-700 border-neutral-600 text-white shadow-sm focus:border-white focus:ring-white">
                @error('phone')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_booking" value="1" {{ old('is_booking') ? 'checked' : '' }}
                        class="rounded border-neutral-600 bg-neutral-700 text-white shadow-sm focus:border-white focus:ring-white">
                    <span class="ml-2 text-sm text-gray-300">This is a booking request</span>
                </label>
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-300">Message *</label>
                <textarea id="message" name="message" rows="6" required
                    class="mt-1 block w-full rounded-md bg-neutral-700 border-neutral-600 text-white shadow-sm focus:border-white focus:ring-white">{{ old('message') }}</textarea>
                @error('message')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <button type="submit" class="px-6 py-3 bg-white text-black font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
