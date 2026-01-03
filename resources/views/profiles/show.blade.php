@extends('layouts.public')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-32"></div>
        
        <div class="px-6 py-8">
            <!-- Avatar & Name -->
            <div class="flex items-start -mt-20 mb-6">
                <div class="w-32 h-32 rounded-full border-4 border-white bg-white overflow-hidden shadow-lg">
                    @if($user->avatar_path)
                        <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500 text-4xl font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                
                <div class="ml-6 mt-16">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    
                    @auth
                        @if(auth()->id() === $user->id)
                            <a href="{{ route('profile.edit') }}" class="mt-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                                Edit Profile
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Profile Info -->
            <div class="space-y-6">
                @if($user->birthday)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase">Birthday</h3>
                        <p class="mt-1 text-lg text-gray-900">{{ \Carbon\Carbon::parse($user->birthday)->format('F j, Y') }}</p>
                    </div>
                @endif

                @if($user->bio)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase">About</h3>
                        <p class="mt-1 text-gray-900 whitespace-pre-line">{{ $user->bio }}</p>
                    </div>
                @endif

                @if(!$user->birthday && !$user->bio && auth()->id() !== $user->id)
                    <div class="text-center py-8">
                        <p class="text-gray-500">This user hasn't added any profile information yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
