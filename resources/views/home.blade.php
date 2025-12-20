@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            Welcome to {{ config('app.name') }}
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            Your entertainment destination
        </p>
        <div class="mt-8">
            <a href="{{ route('shows.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Browse Shows
            </a>
        </div>
    </div>
</div>
@endsection
