<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/3ske.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-neutral-900 text-white">
        <div class="min-h-screen">
            <!-- Public Navigation -->
            <nav class="bg-black border-b border-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center h-20 relative">
                        <!-- Left Navigation -->
                        <div class="hidden md:flex space-x-8 flex-1 justify-end mr-12">
                            <a href="{{ route('home') }}" class="text-xl text-white hover:text-gray-300 transition duration-150 ease-in-out uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">
                                About
                            </a>
                            <a href="{{ route('shows.index') }}" class="text-xl text-white hover:text-gray-300 transition duration-150 ease-in-out uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">
                                Tour Dates
                            </a>
                            <a href="{{ route('news.index') }}" class="text-xl text-white hover:text-gray-300 transition duration-150 ease-in-out uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">
                                News
                            </a>
                        </div>

                        <!-- Center Logo -->
                        <div class="flex items-center flex-shrink-0">
                            <a href="{{ route('home') }}" class="flex items-center">
                                <img src="{{ asset('images/3skewitgroot.png') }}" alt="3SKE" class="h-16 w-auto">
                            </a>
                        </div>

                        <!-- Right Navigation -->
                        <div class="hidden md:flex space-x-8 flex-1 ml-12 items-center">
                            <a href="{{ route('faq') }}" class="text-xl text-white hover:text-gray-300 transition duration-150 ease-in-out uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">
                                FAQ
                            </a>
                            <a href="https://www.instagram.com/dj3ske/" target="_blank" rel="noopener noreferrer" class="text-xl text-white hover:text-gray-300 transition duration-150 ease-in-out uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">
                                Socials
                            </a>
                            <a href="{{ route('contact') }}" class="text-xl text-white hover:text-gray-300 transition duration-150 ease-in-out uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">
                                Contact
                            </a>
                        </div>
                        
                        <!-- Auth Links - Absolute Right -->
                        <div class="hidden md:flex space-x-4 absolute right-4 items-center">
                            @auth
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-400 hover:text-white transition">Dashboard</a>
                                @endif
                                
                                <!-- User Dropdown -->
                                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                    <button @click="open = !open" class="flex items-center text-sm text-gray-400 hover:text-white transition focus:outline-none">
                                        <span>{{ auth()->user()->name }}</span>
                                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    
                                    <div x-show="open" 
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="transform opacity-0 scale-95"
                                         x-transition:enter-end="transform opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="transform opacity-100 scale-100"
                                         x-transition:leave-end="transform opacity-0 scale-95"
                                         class="absolute right-0 mt-2 w-48 bg-neutral-800 rounded-md shadow-lg py-1 border border-neutral-700 z-50"
                                         style="display: none;">
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-neutral-700 hover:text-white">Profile</a>
                                        <a href="{{ route('favorites.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-neutral-700 hover:text-white">My Favorites</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-300 hover:bg-neutral-700 hover:text-white">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-sm text-gray-400 hover:text-white transition">Register</a>
                                @endif
                            @endauth
                        </div>

                        <!-- Mobile menu button -->
                        <div class="md:hidden">
                            <button type="button" class="text-white hover:text-gray-300 focus:outline-none focus:text-gray-300" onclick="toggleMobileMenu()">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Navigation -->
                    <div id="mobileMenu" class="hidden md:hidden pb-4">
                        <div class="flex flex-col space-y-2">
                            <a href="{{ route('home') }}" class="text-white hover:text-gray-300 px-3 py-2 text-sm uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">About</a>
                            <a href="{{ route('shows.index') }}" class="text-white hover:text-gray-300 px-3 py-2 text-sm uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">Tour Dates</a>
                            <a href="{{ route('news.index') }}" class="text-white hover:text-gray-300 px-3 py-2 text-sm uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">News</a>
                            <a href="{{ route('faq') }}" class="text-white hover:text-gray-300 px-3 py-2 text-sm uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">FAQ</a>
                            <a href="https://www.instagram.com/dj3ske/" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-300 px-3 py-2 text-sm uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">Socials</a>
                            <a href="{{ route('contact') }}" class="text-white hover:text-gray-300 px-3 py-2 text-sm uppercase tracking-wider" style="font-family: 'Gagalin', sans-serif;">Contact</a>
                            
                            <!-- Auth Links Mobile -->
                            @auth
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-white px-3 py-2 text-sm">Dashboard</a>
                                @endif
                                <a href="{{ route('profile.edit') }}" class="text-gray-400 hover:text-white px-3 py-2 text-sm">Profile</a>
                                <a href="{{ route('favorites.index') }}" class="text-gray-400 hover:text-white px-3 py-2 text-sm">My Favorites</a>
                                <form method="POST" action="{{ route('logout') }}" class="px-3">
                                    @csrf
                                    <button type="submit" class="text-gray-400 hover:text-white py-2 text-sm">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-400 hover:text-white px-3 py-2 text-sm">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-400 hover:text-white px-3 py-2 text-sm">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <script>
                function toggleMobileMenu() {
                    const menu = document.getElementById('mobileMenu');
                    menu.classList.toggle('hidden');
                }
            </script>

            <!-- Page Content -->
            <main class="bg-black">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-black border-t border-gray-800 mt-12">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-gray-400 text-sm">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
