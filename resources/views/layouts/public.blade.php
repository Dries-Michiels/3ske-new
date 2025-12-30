<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Public Navigation -->
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('home') }}" class="text-xl font-bold">
                                    {{ config('app.name', 'Laravel') }}
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    Home
                                </a>
                                <a href="{{ route('shows.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('shows.*') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    Shows
                                </a>
                                <a href="{{ route('news.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('news.*') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    News
                                </a>
                                <a href="{{ route('faq') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('faq') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    FAQ
                                </a>
                                <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-gray-900 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    Contact
                                </a>
                            </div>
                        </div>

                        <!-- Auth Links -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Profile
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900 mr-4">Log in</a>
                                <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-gray-900">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 mt-12">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-gray-500 text-sm">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
