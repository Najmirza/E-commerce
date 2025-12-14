@extends('layouts.app')

@section('title', $product->name . ' - Kettle')

@section('content')
    <div class="min-h-screen pt-32 pb-16 container mx-auto px-6 md:px-16">
        
        <!-- Breadcrumbs -->
        <div class="flex items-center gap-2 text-sm text-brand-dark/50 mb-8">
            <a href="{{ route('home') }}" class="hover:text-brand-copper">Home</a>
            <span>/</span>
            <a href="{{ route('shop.show', $product->shop->slug) }}" class="hover:text-brand-copper">{{ $product->shop->name }}</a>
            <span>/</span>
            <span class="text-brand-dark font-medium">{{ $product->name }}</span>
        </div>

        <div class="grid md:grid-cols-2 gap-16 items-start">
            <!-- Image Section -->
            <div class="bg-white rounded-[2rem] p-10 shadow-sm relative overflow-hidden group">
                <div class="absolute inset-0 bg-brand-sage/5 rounded-[2rem] transform rotate-3 scale-90 -z-10 transition-transform group-hover:rotate-0 group-hover:scale-100"></div>
                <img src="{{ asset('images/feature.png') }}" alt="{{ $product->name }}" class="w-full object-contain drop-shadow-xl hover:scale-105 transition-transform duration-500">
            </div>

            <!-- Details Section -->
            <div class="space-y-8" x-data="{ price: {{ $product->price }}, quantity: 1 }">
                 <div>
                     <p class="text-brand-copper font-bold uppercase tracking-widest text-sm mb-2">{{ $product->category->name ?? 'Collection' }}</p>
                     <h1 class="font-serif text-5xl md:text-6xl text-brand-dark leading-tight">{{ $product->name }}</h1>
                 </div>

                 <div class="flex items-center gap-6 border-b border-brand-dark/10 pb-8">
                     <span class="font-serif text-3xl font-bold text-brand-dark" x-text="'$' + (price * quantity).toFixed(2)">${{ $product->price }}</span>
                     <div class="flex text-yellow-400 text-sm">★★★★★ <span class="text-brand-dark/40 ml-2 text-sm font-medium">(24 reviews)</span></div>
                 </div>

                 <p class="text-brand-dark/70 text-lg leading-relaxed">
                     {{ $product->description ?? 'Experience the perfect blend of style and functionality. This premium kettle features unmatched boiling speed, ergonomic handle design, and a finish that complements any modern kitchen.' }}
                 </p>

                 <!-- Vendor Small Widget -->
                 <div class="flex items-center gap-4 py-4 px-6 bg-white/60 rounded-xl border border-white">
                     <div class="w-10 h-10 bg-brand-dark text-white rounded-full flex items-center justify-center font-serif text-sm">
                         {{ substr($product->shop->name, 0, 1) }}
                     </div>
                     <div>
                         <p class="text-xs text-brand-dark/50 uppercase font-bold">Sold by</p>
                         <a href="{{ route('shop.show', $product->shop->slug) }}" class="font-bold text-brand-dark hover:text-brand-copper">{{ $product->shop->name }}</a>
                     </div>
                 </div>

                 <form action="{{ route('cart.add') }}" method="POST" class="flex gap-4 pt-4">
                     @csrf
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                     
                     <div class="w-full md:w-auto">
                        <label class="block text-xs font-bold uppercase text-brand-dark/50 mb-2">Quantity</label>
                        <div class="flex items-center border border-brand-dark/20 rounded-full w-32 px-4 py-2 bg-white">
                            <button type="button" class="text-brand-dark/50 hover:text-brand-dark" @click="if(quantity > 1) quantity--">-</button>
                            <input type="number" name="quantity" x-model="quantity" class="w-full text-center bg-transparent border-none focus:ring-0 p-0 font-bold" min="1">
                            <button type="button" class="text-brand-dark/50 hover:text-brand-dark" @click="quantity++">+</button>
                        </div>
                     </div>
                 
                     <!-- Add to Cart Button Logic -->
                     @auth
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-brand-dark text-white font-medium rounded-full shadow-xl hover:bg-brand-copper transition-all duration-300 transform hover:-translate-y-1">
                            Add to Cart
                        </button>
                     @else
                        <a href="{{ route('login') }}" class="w-full md:w-auto px-12 py-4 bg-brand-dark text-white font-medium rounded-full shadow-xl hover:bg-brand-copper transition-all duration-300 transform hover:-translate-y-1 block text-center">
                            Add to Cart
                        </a>
                     @endauth
                 </form>
            </div>
        </div>
    </div>
@endsection

