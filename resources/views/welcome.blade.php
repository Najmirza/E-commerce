<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kettle - Brew with Elegance</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-brand-dark bg-brand-beige selection:bg-brand-copper selection:text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="absolute w-full z-50 top-0 py-6 px-8 md:px-16 flex justify-between items-center bg-transparent">
        <div class="flex items-center gap-2">
            <!-- Brand Logo (Text) -->
            <a href="/" class="text-2xl font-serif font-bold tracking-tight text-brand-dark">Kettle.</a>
        </div>

        <div class="hidden md:flex gap-10 text-sm font-medium tracking-wide uppercase text-brand-dark/80">
            <a href="#home" class="hover:text-brand-copper transition-colors">Home</a>
            <a href="#shop" class="hover:text-brand-copper transition-colors">Shop</a>
            <a href="#about" class="hover:text-brand-copper transition-colors">About Us</a>
            <a href="#contact" class="hover:text-brand-copper transition-colors">Contact Us</a>
        </div>

        <div class="flex items-center gap-6">
            @if (Route::has('login'))
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center gap-2 hover:text-brand-copper transition-colors">
                            <span class="text-xs font-bold uppercase tracking-widest text-brand-dark/80">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-dark/50" viewBox="0 0 20 20" fill="currentColor">
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
                            
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-brand-dark hover:bg-brand-copper/5 hover:text-brand-copper transition-colors">My Profile</a>
                            <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-brand-dark hover:bg-brand-copper/5 hover:text-brand-copper transition-colors">My Orders</a>
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
                    <a href="{{ route('login') }}" class="hover:text-brand-copper p-2 rounded-full hover:bg-white/50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                @endauth
            @endif
            <a href="{{ route('cart') }}" class="relative hover:text-brand-copper p-2 rounded-full hover:bg-white/50 transition-all">
                <span class="absolute top-1 right-1 h-2 w-2 bg-brand-copper rounded-full"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center pt-24 overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#EADFDA] via-[#F3EBEB] to-[#DDEBF0] -z-10"></div>
        <div class="absolute top-0 right-0 w-2/3 h-full bg-gradient-to-bl from-white/20 to-transparent rounded-full blur-3xl transform translate-x-1/4 -translate-y-1/4"></div>

        <div class="container mx-auto px-6 md:px-16 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8 z-10 fade-in-up">
                <div class="space-y-2">
                    <p class="text-xs font-bold tracking-[0.2em] uppercase text-brand-dark/60">Brew with Passion</p>
                    <h1 class="font-serif text-6xl md:text-7xl lg:text-8xl leading-[0.9] text-brand-dark">
                        BREW WITH <br> <span class="font-light italic pr-2">ELEGANCE</span>
                    </h1>
                </div>
                
                <p class="text-brand-dark/70 max-w-md leading-relaxed">
                    Introducing our premium collection of vintage-inspired electric kettles. 
                    Where timeless design meets modern technology for the perfect pour every time.
                </p>

                <div class="flex gap-4 pt-4">
                    <a href="#" class="px-8 py-3 bg-brand-dark text-brand-beige font-medium rounded-full hover:bg-brand-copper transition-colors duration-300 shadow-lg shadow-brand-dark/10">
                        Shop Now
                    </a>
                    <a href="#" class="px-8 py-3 bg-white/50 backdrop-blur-sm border border-white text-brand-dark font-medium rounded-full hover:bg-white transition-colors duration-300">
                        View Details
                    </a>
                </div>
                
                <!-- Social/User Proof Snippet -->
                <div class="pt-8 flex items-center gap-4">
                    <div class="flex -space-x-4">
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover" src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img class="w-10 h-10 rounded-full border-2 border-white object-cover" src="https://i.pravatar.cc/100?img=5" alt="User">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-brand-copper flex items-center justify-center text-xs text-white font-medium">+2k</div>
                    </div>
                    <div>
                        <p class="text-sm font-bold">12k+ Happy</p>
                        <p class="text-xs text-brand-dark/60">Coffee Lovers</p>
                    </div>
                </div>
            </div>

            <div class="relative h-full min-h-[500px] flex items-center justify-center">
                <!-- Kettle Image -->
                <div class="absolute inset-0 bg-transparent"></div>
                <img src="{{ asset('images/hero.png') }}" alt="Vintage Kettle Set" class="w-full max-w-2xl object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-700 ease-out z-10">
                
                <!-- Floating Info Card -->
                <div class="absolute top-10 right-10 bg-white/80 backdrop-blur-md p-4 rounded-2xl shadow-xl z-20 hidden md:block animate-float">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-brand-blue/30 rounded-full flex items-center justify-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brand-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase text-brand-copper">Fast Boil</p>
                            <p class="text-sm font-bold">3000 Watts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section 1 (Discover the Art) -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-6 md:px-16 grid md:grid-cols-2 gap-16 items-center">
             <!-- Text Left -->
             <div class="space-y-6">
                <p class="text-brand-copper text-sm font-bold uppercase tracking-widest">About Kettle</p>
                <h2 class="font-serif text-5xl text-brand-dark leading-tight">DISCOVER THE ART <br> OF BOILING</h2>
                <p class="text-brand-dark/70 text-lg leading-relaxed">
                    Our kettles are not just appliances; they are a statement piece for your kitchen. 
                    Engineered with precision for speed and silence, and designed with a vintage aesthetic that never goes out of style.
                </p>
                <a href="#" class="inline-block border-b border-brand-dark pb-1 text-brand-dark font-medium hover:text-brand-copper hover:border-brand-copper transition-colors">Our Story</a>
            </div>

            <!-- Image Right -->
            <div class="relative">
               <div class="absolute -top-10 -right-10 w-full h-full bg-brand-blue/30 rounded-[3rem] -z-10 transform rotate-3"></div>
               <img src="{{ asset('images/lifestyle-toaster.png') }}" alt="Toaster and Kettle Set" class="w-full rounded-[2.5rem] shadow-2xl z-10 relative">
               <button class="absolute top-10 left-10 bg-brand-dark text-white p-4 rounded-full shadow-lg hover:bg-brand-copper transition-colors">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
               </button>
            </div>
        </div>
    </section>
<!-- About Us Section -->
    <section id="about" class="py-24 bg-gradient-to-br from-gray-900 via-blue-950 to-black relative overflow-hidden border-t border-white/5">
        <div class="absolute top-0 left-0 w-64 h-64 bg-cyan-500/10 rounded-full -ml-32 -mt-32 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full -mr-32 -mb-32 blur-3xl"></div>
        
        <div class="container mx-auto px-6 md:px-16 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-xs font-bold tracking-[0.2em] uppercase text-cyan-400 mb-4 drop-shadow-[0_0_5px_rgba(34,211,238,0.5)]">Our Story</p>
                <h2 class="font-serif text-5xl text-white mb-8 drop-shadow-[0_0_10px_rgba(255,255,255,0.2)]">Crafting the Perfect Brew</h2>
                <div class="prose prose-lg mx-auto text-white/70">
                    <p class="mb-6">
                        Kettle was born from a simple belief: that the ritual of tea and coffee brewing deserves tools as refined as the beverage itself. 
                        We didn't just want to boil water; we wanted to elevate the entire experience.
                    </p>
                    <p class="mb-8">
                        Our journey began in a small artisan workshop, obsessed with combining thermal precision with timeless aesthetics. 
                        Every curve of our kettles is intentional, designed for the perfect pour, while our technology ensures the exact temperature for your delicate green teas or robust pour-over coffees.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8 mt-16 border-t border-white/10 pt-12">
                    <div class="group">
                        <h4 class="font-serif text-3xl text-white mb-2 group-hover:text-cyan-400 transition-colors duration-300">2010</h4>
                        <p class="text-sm font-bold uppercase tracking-widest text-white/40 group-hover:text-cyan-400/70 transition-colors">Founded</p>
                    </div>
                    <div class="group">
                        <h4 class="font-serif text-3xl text-white mb-2 group-hover:text-cyan-400 transition-colors duration-300">50k+</h4>
                        <p class="text-sm font-bold uppercase tracking-widest text-white/40 group-hover:text-cyan-400/70 transition-colors">Happy Brewers</p>
                    </div>
                    <div class="group">
                        <h4 class="font-serif text-3xl text-white mb-2 group-hover:text-cyan-400 transition-colors duration-300">Awarded</h4>
                        <p class="text-sm font-bold uppercase tracking-widest text-white/40 group-hover:text-cyan-400/70 transition-colors">Best Design</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us / Accordion -->
    <section class="py-24 bg-brand-beige/50">
        <div class="container mx-auto px-6 md:px-16 grid md:grid-cols-2 gap-16 items-center">
            <!-- Image Left -->
            <div class="relative h-[600px] bg-gradient-to-t from-brand-sage/20 to-transparent rounded-[3rem] p-10 flex items-center justify-center">
               <img src="{{ asset('images/lifestyle-hand.png') }}" alt="Why Choose Us" class="w-full h-full object-cover rounded-3xl drop-shadow-2xl hover:scale-105 transition-transform duration-500">
               <!-- Decorative Circle -->
               <div class="absolute bottom-10 right-10 w-32 h-32 border-2 border-white/50 rounded-full"></div>
            </div>

             <!-- Text Right -->
             <div class="space-y-8">
               <div>
                   <p class="text-brand-copper text-sm font-bold uppercase tracking-widest">Our Features</p>
                   <h2 class="font-serif text-4xl md:text-5xl text-brand-dark mb-4">WHY CHOOSE US</h2>
                   <p class="text-brand-dark/70">We merge elegant design with functional excellence.</p>
               </div>

               <div class="space-y-4">
                   <!-- Accordion Item 1 -->
                   <div class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all cursor-pointer border border-transparent hover:border-brand-blue">
                       <div class="flex justify-between items-center">
                           <h3 class="font-bold text-lg text-brand-dark group-hover:text-brand-copper transition-colors">Exceptional Quality</h3>
                           <span class="text-brand-copper text-2xl group-hover:rotate-45 transition-transform">+</span>
                       </div>
                   </div>
                   <!-- Accordion Item 2 -->
                   <div class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all cursor-pointer border border-transparent hover:border-brand-blue">
                       <div class="flex justify-between items-center">
                           <h3 class="font-bold text-lg text-brand-dark group-hover:text-brand-copper transition-colors">Versatile Design</h3>
                           <span class="text-brand-copper text-2xl group-hover:rotate-45 transition-transform">+</span>
                       </div>
                       <p class="hidden group-hover:block text-brand-dark/60 mt-2 text-sm">Fits any kitchen setting, from modern minimalist to rustic farmhouse.</p>
                   </div>
                   <!-- Accordion Item 3 -->
                   <div class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all cursor-pointer border border-transparent hover:border-brand-blue">
                       <div class="flex justify-between items-center">
                           <h3 class="font-bold text-lg text-brand-dark group-hover:text-brand-copper transition-colors">Fast Boiling</h3>
                           <span class="text-brand-copper text-2xl group-hover:rotate-45 transition-transform">+</span>
                       </div>
                   </div>
                   <!-- Accordion Item 4 -->
                   <div class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition-all cursor-pointer border border-transparent hover:border-brand-blue">
                       <div class="flex justify-between items-center">
                           <h3 class="font-bold text-lg text-brand-dark group-hover:text-brand-copper transition-colors">Innovative Tech</h3>
                           <span class="text-brand-copper text-2xl group-hover:rotate-45 transition-transform">+</span>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </section>

    <!-- Specs Section -->
    <section class="py-24 bg-gradient-to-r from-[#EEE4E6] to-[#E3ECF3]">
        <div class="container mx-auto px-6 md:px-16 grid md:grid-cols-2 gap-12 items-center">
             <div>
                <p class="text-xs font-bold tracking-[0.2em] uppercase text-brand-dark/60 mb-2">Available Now</p>
                <h2 class="font-serif text-6xl text-brand-dark mb-12">ELEGANT <br> KETTLE</h2>

                <div class="space-y-6 bg-white/40 backdrop-blur-md p-8 rounded-2xl border border-white/50">
                    <div class="grid grid-cols-2 border-b border-brand-dark/10 pb-4">
                        <span class="font-bold text-brand-dark">Capacity</span>
                        <span class="text-brand-dark/70">1.7 Liters</span>
                    </div>
                    <div class="grid grid-cols-2 border-b border-brand-dark/10 pb-4">
                         <span class="font-bold text-brand-dark">Power Consumption</span>
                         <span class="text-brand-dark/70">3000 Watts</span>
                    </div>
                    <div class="grid grid-cols-2 border-b border-brand-dark/10 pb-4">
                         <span class="font-bold text-brand-dark">Material</span>
                         <span class="text-brand-dark/70">Stainless Steel / Enamel</span>
                    </div>
                    <div class="grid grid-cols-2">
                         <span class="font-bold text-brand-dark">Warranty</span>
                         <span class="text-brand-dark/70">2 Years</span>
                    </div>
                </div>

                <div class="flex gap-4 mt-8">
                     <div class="w-12 h-12 rounded-full bg-[#A8C2BD] shadow-lg cursor-pointer hover:ring-2 ring-offset-2 ring-brand-dark"></div>
                     <div class="w-12 h-12 rounded-full bg-[#C0C0C0] shadow-lg cursor-pointer hover:ring-2 ring-offset-2 ring-brand-dark"></div>
                     <div class="w-12 h-12 rounded-full bg-[#D4A373] shadow-lg cursor-pointer hover:ring-2 ring-offset-2 ring-brand-dark"></div>
                </div>
             </div>
             
             <div class="flex justify-center relative">
                 <div class="absolute inset-0 bg-white/30 blur-3xl rounded-full transform scale-75"></div>
                 <img src="{{ asset('images/feature.png') }}" class="relative z-10 max-w-lg w-full drop-shadow-2xl" alt="Elegant Kettle">
             </div>
        </div>
    </section>

    <!-- Product Grid -->
    <section class="py-24 bg-brand-beige">
        <div class="container mx-auto px-6 md:px-16">
            <div class="text-center mb-16">
                <h2 class="font-serif text-4xl mb-4 text-brand-dark">OUR PRODUCTS</h2>
                <p class="text-brand-dark/60">Choose the perfect style for your morning ritual.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $generalProducts = \App\Models\Product::where('is_exclusive', false)->with('category')->take(6)->get();
                @endphp

                @foreach($generalProducts as $product)
                <div class="group bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 block relative">
                    <!-- Link Wrapper for Image -->
                    <a href="{{ route('product.show', $product->slug) }}" class="block">
                        <div class="relative bg-brand-bg rounded-2xl h-64 flex items-center justify-center overflow-hidden mb-6">
                            <img src="{{ asset($product->image) }}" class="h-48 object-contain group-hover:scale-110 transition-transform duration-500" alt="{{ $product->name }}">
                        </div>
                    </a>

                    <!-- Cart Action -->
                    <div class="absolute top-[16rem] right-10 z-20"> 
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="bg-white p-3 rounded-full shadow-md text-brand-dark hover:bg-brand-copper hover:text-white transition-colors transform hover:scale-110 active:scale-95">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('cart.intent', $product->id) }}" class="block bg-white p-3 rounded-full shadow-md text-brand-dark hover:bg-brand-copper hover:text-white transition-colors transform hover:scale-110 active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                            </a>
                        @endauth
                    </div>

                    <!-- Link Wrapper for Content -->
                    <a href="{{ route('product.show', $product->slug) }}" class="block">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-brand-dark mb-1">{{ $product->name }}</h3>
                                <p class="text-sm text-brand-dark/50">{{ $product->category->name ?? 'Collection' }}</p>
                            </div>
                            <span class="font-serif font-bold text-xl text-brand-dark">${{ $product->price }}</span>
                        </div>
                        <div class="mt-4 flex text-yellow-400 text-sm">★★★★★ <span class="text-gray-300 ml-2">({{ rand(10,50) }})</span></div>
                    </a>
                </div>
                @endforeach
            </div>
            
            <div class="mt-16 text-center">
                 <a href="#" class="px-8 py-3 bg-brand-dark text-brand-beige font-medium rounded-full hover:bg-brand-copper transition-colors duration-300 shadow-lg shadow-brand-dark/10">
                        View All Products
                 </a>
            </div>
        </div>
    </section>
    <!-- Exclusive Member Collection -->
    @auth
        @php
            $exclusiveProducts = \App\Models\Product::where('is_exclusive', true)->where('status', 'published')->get();
        @endphp
        @if($exclusiveProducts->count() > 0)
        <section class="py-24 bg-brand-dark/5">
            <div class="container mx-auto px-6 md:px-16">
                <div class="text-center mb-16">
                    <p class="text-brand-copper text-sm font-bold uppercase tracking-widest mb-2">Member Exclusive</p>
                    <h2 class="font-serif text-4xl mb-4 text-brand-dark">LIMITED EDITION COLLECTION</h2>
                    <p class="text-brand-dark/60">Reserved for our most valued members.</p>
                </div>

                <div class="relative group/slider" 
                     x-data="{
                        scrollContainer: null,
                        init() {
                            this.scrollContainer = this.$refs.slider;
                        },
                        slideNext() {
                            if (!this.scrollContainer) return;
                            const container = this.scrollContainer;
                            const cardWidth = container.firstElementChild.getBoundingClientRect().width; 
                            const gap = 32;
                            const jump = cardWidth + gap;

                            container.scrollBy({ left: jump, behavior: 'smooth' });

                            setTimeout(() => {
                                if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 10) {
                                    container.scrollTo({ left: 0, behavior: 'auto' });
                                }
                            }, 500);
                        },
                        slidePrev() {
                            if (!this.scrollContainer) return;
                            const container = this.scrollContainer;
                            const cardWidth = container.firstElementChild.getBoundingClientRect().width; 
                            const gap = 32;
                            const jump = cardWidth + gap;

                            if (container.scrollLeft <= 10) {
                                container.scrollTo({ left: container.scrollWidth, behavior: 'smooth' }); 
                            } else {
                                container.scrollBy({ left: -jump, behavior: 'smooth' });
                            }
                        }
                     }"
                >
                    <!-- Navigation Buttons -->
                    <button @click="slidePrev()" class="absolute -left-4 md:-left-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-brand-dark hover:bg-brand-copper hover:text-white transition-all duration-300 opacity-0 group-hover/slider:opacity-100 focus:opacity-100 hidden md:flex">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </button>
                    <button @click="slideNext()" class="absolute -right-4 md:-right-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-brand-dark hover:bg-brand-copper hover:text-white transition-all duration-300 opacity-0 group-hover/slider:opacity-100 focus:opacity-100 hidden md:flex">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>

                    <!-- Scroll Container -->
                    <div x-ref="slider" class="flex gap-8 overflow-x-auto snap-x snap-mandatory pb-12 -mx-6 px-6 scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
                        @php
                            // Duplicate the first 6 items to create an infinite loop buffer at the end for 5-column layout
                            $loopedProducts = $exclusiveProducts->merge($exclusiveProducts->take(6));
                        @endphp
                        
                        @foreach($loopedProducts as $index => $product)
                        <!-- 5 Items per slide means width ~ 20% minus gap. We use calc for precision -->
                        <div class="min-w-[45vw] md:min-w-[calc(20%-1.5rem)] snap-start flex-shrink-0"
                             data-index="{{ $index }}"
                        >
                            <div class="group bg-white rounded-3xl p-4 shadow-sm hover:shadow-xl transition-all duration-300 block border border-brand-copper/20 relative overflow-hidden h-full">
                                
                                <!-- Exclusive Badge -->
                                <div class="absolute top-2 left-2 bg-brand-copper text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full z-10">
                                    Exclusive
                                </div>

                                <a href="{{ route('product.show', $product->slug) }}" class="block">
                                    <div class="relative bg-brand-dark/5 rounded-2xl h-40 flex items-center justify-center overflow-hidden mb-4">
                                        <img src="{{ asset($product->image) }}" class="h-28 object-contain group-hover:scale-110 transition-transform duration-500 drop-shadow-lg" alt="{{ $product->name }}">
                                    </div>
                                </a>

                                <!-- Cart Action -->
                                <div class="absolute top-[8rem] right-6 z-20">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="bg-white p-2 rounded-full shadow-md text-brand-dark hover:bg-brand-copper hover:text-white transition-colors transform hover:scale-110 active:scale-95">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                                        </button>
                                    </form>
                                </div>

                                <a href="{{ route('product.show', $product->slug) }}" class="block">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-sm text-brand-dark mb-1 leading-tight line-clamp-1">{{ $product->name }}</h3>
                                            <p class="text-[10px] text-brand-dark/50">Premium Series</p>
                                        </div>
                                        <span class="font-serif font-bold text-sm text-brand-copper">${{ $product->price }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Gradient Fade overlay for scroll indication -->
                    <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-brand-dark/5 to-transparent pointer-events-none"></div>
                </div>
            </div>
        </section>
        @endif
    @endauth
    <!-- Experience Elegance (Bottom Banner) -->
    <section class="py-24 bg-gradient-to-r from-[#EEE4E6] to-[#E3ECF3] relative overflow-hidden">
        <div class="container mx-auto px-6 md:px-16 grid md:grid-cols-2 lg:grid-cols-5 gap-12 items-center">
             <!-- Left Image (Spans 3 cols on large) -->
             <div class="lg:col-span-3 relative">
                 <div class="absolute inset-0 bg-white/30 blur-3xl rounded-full transform scale-75"></div>
                 <img src="{{ asset('images/bottom-kettle.png') }}" class="relative z-10 w-full max-w-2xl transform -rotate-12 hover:rotate-0 transition-transform duration-1000" alt="Experience Elegance">
             </div>

             <!-- Right Text (Spans 2 cols on large) -->
             <div class="lg:col-span-2 space-y-6">
                 <h2 class="font-serif text-4xl md:text-5xl text-brand-dark leading-tight">EXPERIENCE <br> ELEGANCE WITH <br> OUR KETTLE</h2>
                 <p class="text-brand-dark/70 text-lg">
                     Elevate your daily ritual with our latest vintage collection. 
                     Designed for lasting quality and style.
                 </p>
                 
                 <div class="flex items-center gap-4 pt-4">
                     <div class="w-10 h-10 bg-white/50 rounded-full flex items-center justify-center text-brand-dark cursor-pointer hover:bg-brand-copper hover:text-white transition-colors">
                         <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                     </div>
                     <div class="w-10 h-10 bg-white/50 rounded-full flex items-center justify-center text-brand-dark cursor-pointer hover:bg-brand-copper hover:text-white transition-colors">
                         <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.072 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.206-6.788 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.206 4.358 2.618 6.789 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.206 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                     </div>
                     <div class="w-10 h-10 bg-white/50 rounded-full flex items-center justify-center text-brand-dark cursor-pointer hover:bg-brand-copper hover:text-white transition-colors">
                         <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.441 16.892c-2.102.144-6.784.144-8.883 0-2.276-.156-2.541-1.27-2.558-4.892.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0 2.277.156 2.541 1.27 2.559 4.892-.018 3.629-.285 4.736-2.559 4.892zm-6.441-5.723l5.676 3.298-5.676 3.296v-6.594z"/></svg>
                     </div>
                     <div class="w-10 h-10 bg-white/50 rounded-full flex items-center justify-center text-brand-dark cursor-pointer hover:bg-brand-copper hover:text-white transition-colors">
                         <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                     </div>
                 </div>
             </div>
        </div>
    </section>

    

    <!-- Contact Us Section -->
    <section id="contact" class="py-24 bg-gray-950 border-t border-white/5 relative overflow-hidden">
        <!-- Background Glows -->
        <div class="absolute top-1/2 left-0 w-96 h-96 bg-cyan-500/5 rounded-full blur-[100px] -translate-y-1/2 -translate-x-1/4"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-600/5 rounded-full blur-[100px] translate-y-1/4 translate-x-1/4"></div>

        <div class="container mx-auto px-6 md:px-16 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Info Column -->
                <div>
                    <p class="text-xs font-bold tracking-[0.2em] uppercase text-cyan-400 mb-4 drop-shadow-[0_0_5px_rgba(34,211,238,0.5)]">Get in Touch</p>
                    <h2 class="font-serif text-5xl text-white mb-8 drop-shadow-[0_0_10px_rgba(255,255,255,0.2)]">Let's Brew Something <br> Together.</h2>
                    <p class="text-white/70 text-lg mb-10 leading-relaxed">
                        Have a question about our collection or need assistance with your order? Our team of tea enthusiasts and design experts is here to help you perfect your ritual.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 bg-gray-900 border border-cyan-500/30 rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(6,182,212,0.1)] text-cyan-400 shrink-0 group-hover:bg-cyan-500/10 group-hover:border-cyan-400 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 drop-shadow-[0_0_5px_rgba(34,211,238,0.8)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-white group-hover:text-cyan-300 transition-colors">Visit Our Showroom</h4>
                                <p class="text-white/50">123 Kettle Lane, Artisan District<br>Brew City, BC 90210</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 bg-gray-900 border border-cyan-500/30 rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(6,182,212,0.1)] text-cyan-400 shrink-0 group-hover:bg-cyan-500/10 group-hover:border-cyan-400 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 drop-shadow-[0_0_5px_rgba(34,211,238,0.8)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-white group-hover:text-cyan-300 transition-colors">Email Us</h4>
                                <p class="text-white/50">najmirza7867@gmail.com</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 group">
                            <div class="w-12 h-12 bg-gray-900 border border-cyan-500/30 rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(6,182,212,0.1)] text-cyan-400 shrink-0 group-hover:bg-cyan-500/10 group-hover:border-cyan-400 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 drop-shadow-[0_0_5px_rgba(34,211,238,0.8)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-white group-hover:text-cyan-300 transition-colors">Call Us</h4>
                                <p class="text-white/50">+91 9937762490</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 p-10 rounded-3xl shadow-[0_0_30px_rgba(6,182,212,0.1)] relative overflow-hidden group hover:border-cyan-500/40 transition-colors duration-500">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/10 rounded-full -mr-16 -mt-16 blur-2xl"></div>
                    
                    <div id="contact-success" class="hidden bg-green-900/40 border border-green-500/30 text-green-300 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-2 relative z-10">
                        <svg class="w-5 h-5 drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span id="contact-success-message">Thank you for your message! We will get back to you soon.</span>
                    </div>

                    <form id="contact-form" action="{{ route('contact.send') }}" method="POST" class="space-y-6 relative z-10">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-white/50">First Name</label>
                                <input type="text" name="first_name" required class="w-full bg-gray-950/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:bg-gray-900 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 placeholder-white/20 transition-all shadow-inner" placeholder="Jane">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-white/50">Last Name</label>
                                <input type="text" name="last_name" required class="w-full bg-gray-950/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:bg-gray-900 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 placeholder-white/20 transition-all shadow-inner" placeholder="Doe">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-white/50">Email Address</label>
                            <input type="email" name="email" required class="w-full bg-gray-950/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:bg-gray-900 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 placeholder-white/20 transition-all shadow-inner" placeholder="jane@example.com">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-white/50">Message</label>
                            <textarea name="message" required rows="4" class="w-full bg-gray-950/50 border border-white/10 text-white rounded-xl px-4 py-3 focus:bg-gray-900 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 placeholder-white/20 transition-all shadow-inner resize-none" placeholder="Tell us what's on your mind..."></textarea>
                        </div>

                        <button type="submit" id="contact-submit-btn" class="w-full py-4 bg-cyan-500 text-black font-bold uppercase tracking-widest rounded-xl hover:bg-cyan-400 hover:shadow-[0_0_20px_rgba(34,211,238,0.5)] transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contact-form');
            const successDiv = document.getElementById('contact-success');
            const successMessage = document.getElementById('contact-success-message');
            const submitBtn = document.getElementById('contact-submit-btn');

            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Disable button and show loading state if desired (optional)
                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Sending...';

                    const formData = new FormData(contactForm);

                    fetch(contactForm.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    })
                    .then(data => {
                        // Show success message
                        successMessage.innerText = data.message;
                        successDiv.classList.remove('hidden');
                        
                        // Reset form
                        contactForm.reset();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Optionally show error message
                        alert('Something went wrong. Please try again.');
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Send Message';
                    });
                });
            }
        });
    </script>


    <!-- Footer -->
    <footer class="bg-brand-dark text-white/80 py-16">
        <div class="container mx-auto px-6 md:px-16 grid md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2 space-y-6">
                <a href="/" class="text-3xl font-serif font-bold tracking-tight text-white">Kettle.</a>
                <p class="max-w-md text-white/60">Experience the elegance of traditional brewing with our premium kettle collection. Designed for those who appreciate the finer details.</p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition-all duration-300 hover:shadow-[0_0_10px_rgba(6,182,212,0.5)]">FB</a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition-all duration-300 hover:shadow-[0_0_10px_rgba(6,182,212,0.5)]">TW</a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition-all duration-300 hover:shadow-[0_0_10px_rgba(6,182,212,0.5)]">IG</a>
                </div>
            </div>
            
            <div>
                <h4 class="font-bold text-white mb-6">Shop</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">All Products</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">New Arrivals</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">Accessories</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">Gift Cards</a></li>
                </ul>
            </div>
            
            <div>
                 <h4 class="font-bold text-white mb-6">Company</h4>
                 <ul class="space-y-4 text-sm">
                     <li><a href="/#about" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">Our Story</a></li>
                     <li><a href="#contact" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">Contact Us</a></li>
                     <li><a href="#" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">Terms & Conditions</a></li>
                     <li><a href="#" class="hover:text-cyan-400 transition-colors shadow-cyan-500/50">Privacy Policy</a></li>
                 </ul>
            </div>
        </div>
        <div class="container mx-auto px-6 md:px-16 pt-12 mt-12 border-t border-white/10 flex justify-between items-center text-xs">
            <p>&copy; 2025 Kettle Inc. All rights reserved.</p>
            <p>Designed with Passion.</p>
    </footer>
    @livewireScripts
</body> 
</html>
