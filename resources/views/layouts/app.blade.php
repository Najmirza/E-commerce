<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kettle - Premium Kitchenware')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased text-brand-dark bg-brand-beige selection:bg-brand-copper selection:text-white">
    
    <!-- Navigation -->
    <nav class="absolute w-full z-50 top-0 py-6 px-8 md:px-16 flex justify-between items-center bg-transparent">
        <a href="{{ route('home') }}" class="text-2xl font-serif font-bold tracking-tight {{ View::hasSection('forceDarkNav') ? 'text-white drop-shadow-[0_0_5px_rgba(255,255,255,0.5)]' : 'text-brand-dark' }}">Kettle.</a>
        <div class="hidden md:flex gap-10 text-sm font-medium tracking-wide uppercase {{ View::hasSection('forceDarkNav') ? 'text-white/80' : 'text-brand-dark/80' }}">
            <a href="{{ route('home') }}" class="hover:text-brand-copper transition-colors">Home</a>
             <!-- Cart Link with Badge Placeholder -->
            <a href="{{ route('cart') }}" class="hover:text-brand-copper transition-colors flex items-center gap-2">
                Cart
                <!-- Future: Cart Count Badge -->
            </a>
        </div>
        <div class="flex items-center gap-6">
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2 hover:text-brand-copper transition-colors">
                        <span class="text-xs font-bold uppercase tracking-widest {{ View::hasSection('forceDarkNav') ? 'text-white/70' : 'text-brand-dark/50' }}">{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ View::hasSection('forceDarkNav') ? 'text-white/70' : 'text-brand-dark/50' }}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 z-50 border border-brand-dark/5">
                        
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-brand-dark hover:bg-brand-sage/10 hover:text-brand-copper transition-colors">My Profile</a>
                        <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-brand-dark hover:bg-brand-sage/10 hover:text-brand-copper transition-colors">My Orders</a>
                         <div class="border-t border-gray-100 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="hover:text-brand-copper font-medium text-sm {{ View::hasSection('forceDarkNav') ? 'text-white' : '' }}">Login</a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-dark text-white/80 py-12 border-t border-white/10 mt-auto">
        <div class="container mx-auto px-6 md:px-16 flex justify-between items-center text-xs">
            <p>&copy; 2025 Kettle Inc. All rights reserved.</p>
            <p>Designed with Passion.</p>
        </div>
    </footer>

    <!-- Global Components -->
    
    @livewireScripts
</body>
</html>
