<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/3ske.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-neutral-900">
        <div class="min-h-screen">
            <!-- Admin Navigation -->
            <nav class="bg-black border-b border-neutral-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white">
                                    3SKE Admin
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    Dashboard
                                </a>
                                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.users.*') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    Users
                                </a>
                                <a href="{{ route('admin.news.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.news.*') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    News
                                </a>
                                <a href="{{ route('admin.events.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.events.*') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    Events
                                </a>
                                <a href="{{ route('admin.tags.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.tags.*') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    Tags
                                </a>
                                <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.contact-messages.*') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    Inbox
                                </a>
                                <a href="{{ route('admin.faq-categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.faq-categories.*') || request()->routeIs('admin.faq-items.*') ? 'border-white' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:border-gray-400 focus:outline-none focus:border-gray-400 transition duration-150 ease-in-out">
                                    FAQ
                                </a>
                            </div>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <div class="flex items-center">
                                    <a href="{{ route('home') }}" class="text-sm text-gray-300 hover:text-white mr-4">
                                        View Site
                                    </a>
                                    <span class="text-gray-300 text-sm mr-4">{{ Auth::user()->name }}</span>
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="text-sm text-gray-300 hover:text-white">
                                            Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-neutral-800 shadow border-b border-neutral-700">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-12">
                @yield('content')
            </main>
        </div>
    </body>
</html>
