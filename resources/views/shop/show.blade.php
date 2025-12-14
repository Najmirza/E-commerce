<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $shop->name }} - Kettle Shop</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-brand-dark bg-brand-beige selection:bg-brand-copper selection:text-white">
    
    <!-- Navigation -->
    <nav class="absolute w-full z-50 top-0 py-6 px-8 md:px-16 flex justify-between items-center bg-transparent">
        <a href="{{ route('home') }}" class="text-2xl font-serif font-bold tracking-tight text-brand-dark">Kettle.</a>
        <div class="hidden md:flex gap-10 text-sm font-medium tracking-wide uppercase text-brand-dark/80">
            <a href="{{ route('home') }}" class="hover:text-brand-copper transition-colors">Home</a>
            <a href="#" class="hover:text-brand-copper transition-colors">Shop</a>
        </div>
        <div class="flex items-center gap-6">
             <a href="{{ route('login') }}" class="hover:text-brand-copper font-medium">Login</a>
        </div>
    </nav>

    <!-- Shop Header -->
    <div class="pt-32 pb-12 bg-white">
        <div class="container mx-auto px-6 md:px-16 text-center">
            <div class="w-24 h-24 mx-auto bg-brand-sage/20 rounded-full flex items-center justify-center mb-6">
                <!-- Fallback Logo -->
                <span class="font-serif text-3xl text-brand-dark">{{ substr($shop->name, 0, 1) }}</span>
            </div>
            <h1 class="font-serif text-5xl text-brand-dark mb-4">{{ $shop->name }}</h1>
            <p class="text-brand-dark/60 max-w-xl mx-auto">{{ $shop->description ?? 'Purveyors of fine kitchenware and elegant aesthetics.' }}</p>
        </div>
    </div>

    <!-- Filter/Sort Bar -->
    <div class="border-y border-brand-dark/5 bg-white/50 backdrop-blur-sm sticky top-0 z-40">
        <div class="container mx-auto px-6 md:px-16 py-4 flex justify-between items-center">
             <span class="text-sm font-medium text-brand-dark/70">{{ $shop->products->count() }} Products</span>
             <div class="flex gap-4 text-sm font-medium">
                 <button class="hover:text-brand-copper">Sort by: Newest</button>
             </div>
        </div>
    </div>

    <!-- Product Grid -->
    <section class="py-16 min-h-screen">
        <div class="container mx-auto px-6 md:px-16">
            @if($shop->products->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($shop->products as $product)
                    <a href="{{ route('product.show', $product->slug) }}" class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300">
                        <div class="relative bg-[#F5F5F5] rounded-2xl h-64 flex items-center justify-center overflow-hidden mb-6">
                            <img src="{{ asset('images/feature.png') }}" class="h-48 object-contain group-hover:scale-110 transition-transform duration-500" alt="{{ $product->name }}">
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-brand-dark mb-1">{{ $product->name }}</h3>
                                <p class="text-sm text-brand-dark/50">{{ $product->category->name ?? 'Collection' }}</p>
                            </div>
                            <span class="font-serif font-bold text-xl text-brand-dark">${{ $product->price }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-24 text-brand-dark/50">
                    <p class="text-xl">No products found in this shop.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-brand-dark text-white/80 py-12 border-t border-white/10">
        <div class="container mx-auto px-6 md:px-16 flex justify-between items-center text-xs">
            <p>&copy; 2025 Kettle Inc. All rights reserved.</p>
            <p>Designed with Passion.</p>
        </div>
    </footer>
</body>
</html>
