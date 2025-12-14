@extends('layouts.app')

@section('title', 'Secure Checkout - Kettle')
@section('forceDarkNav', true)

@section('content')
<!-- Deep Dark Neon Background -->
<div class="min-h-screen pt-24 pb-12 bg-gradient-to-br from-gray-900 via-blue-950 to-black">
    
    <!-- Header / Branding -->
    <div class="container mx-auto px-6 md:px-16 mb-8">
        <div class="flex items-center justify-center mb-8">
            <a href="/" class="text-3xl font-serif font-bold tracking-tight text-white drop-shadow-[0_0_10px_rgba(255,255,255,0.5)]">Kettle.</a>
        </div>
        
        <!-- Graceful Breadcrumb -->
        <div class="flex items-center justify-center gap-4 text-xs font-bold uppercase tracking-widest text-cyan-400/60">
            <a href="{{ route('cart') }}" class="hover:text-cyan-400 transition-colors">Cart</a>
            <div class="w-8 h-[1px] bg-cyan-500/30"></div>
            <span class="text-white">Information</span>
            <div class="w-8 h-[1px] bg-cyan-500/30"></div>
            <span>Payment</span>
        </div>
    </div>

    <div class="container mx-auto px-6 md:px-16">
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left Column: Deep Neon Glass Form -->
            <div class="lg:col-span-7">
                <div class="bg-gray-900/60 backdrop-blur-xl border border-cyan-500/30 p-8 md:p-12 rounded-[2.5rem] shadow-[0_0_50px_rgba(6,182,212,0.1)]">
                    
                    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form" class="space-y-10">
                        @csrf
                        
                        <!-- Contact Section -->
                        <section>
                            <div class="flex justify-between items-end mb-6">
                                 <h2 class="font-serif text-2xl text-white">Contact Details</h2>
                                 @guest
                                    <span class="text-xs font-bold uppercase tracking-wider text-cyan-400/70">Already a member? <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300 hover:underline">Log in</a></span>
                                 @endguest
                            </div>
                            <div class="relative group">
                                <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}" 
                                       class="w-full bg-black/40 border border-cyan-500/30 rounded-2xl px-6 py-4 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-0 transition-all duration-300 shadow-inner group-hover:shadow-[0_0_15px_rgba(6,182,212,0.15)]" 
                                       placeholder="Email Address" disabled>
                            </div>
                        </section>
    
                        <!-- Shipping Address -->
                        <section>
                             <h2 class="font-serif text-2xl text-white mb-6">Shipping Address</h2>
                             <div class="space-y-4">
                                <div class="grid md:grid-cols-2 gap-4">
                                    <input type="text" name="first_name" required class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all duration-300 shadow-inner" placeholder="First Name">
                                    <input type="text" name="last_name" required class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all duration-300 shadow-inner" placeholder="Last Name">
                                </div>
                                
                                <input type="text" name="address" value="{{ old('address') }}" required class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all duration-300 shadow-inner @error('address') border-red-500 @enderror" placeholder="Full Address">
                                @error('address') <p class="text-red-500 text-xs mt-1 bg-red-500/10 p-2 rounded-lg border border-red-500/20">{{ $message }}</p> @enderror
                                
                                <input type="text" name="city" value="{{ old('city') }}" required class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all duration-300 shadow-inner @error('city') border-red-500 @enderror" placeholder="City">
                                @error('city') <p class="text-red-500 text-xs mt-1 bg-red-500/10 p-2 rounded-lg border border-red-500/20">{{ $message }}</p> @enderror
                                
                                <div class="grid md:grid-cols-3 gap-4">
                                    <!-- Country Style Selection -->
                                    <div class="relative">
                                         <select class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white appearance-none focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 shadow-inner cursor-pointer">
                                             <option class="text-black">India</option>
                                         </select>
                                         <svg class="w-4 h-4 absolute right-6 top-1/2 -translate-y-1/2 text-cyan-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                    
                                    <div class="relative">
                                        <select class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white appearance-none focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 shadow-inner cursor-pointer">
                                            <option class="text-black">State / Province</option>
                                            <option class="text-black">Odisha</option>
                                        </select>
                                        <svg class="w-4 h-4 absolute right-6 top-1/2 -translate-y-1/2 text-cyan-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                   </div>
                                    
                                    <input type="text" name="zip" value="{{ old('zip') }}" required class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all duration-300 shadow-inner @error('zip') border-red-500 @enderror" placeholder="PIN Code">
                                    @error('zip') <p class="text-red-500 text-xs mt-1 col-span-3 bg-red-500/10 p-2 rounded-lg border border-red-500/20">{{ $message }}</p> @enderror
                                </div>
                             </div>
                        </section>
    
                        <!-- Payment -->
                        <section>
                            <h2 class="font-serif text-2xl text-white mb-6">Payment Method</h2>
                            <div class="bg-cyan-900/20 border border-cyan-500/40 rounded-3xl overflow-hidden shadow-[0_0_20px_rgba(6,182,212,0.1)]">
                                <!-- Card Header -->
                                <div class="p-5 bg-black/40 backdrop-blur-md flex items-center justify-between border-b border-cyan-500/20">
                                    <div class="flex items-center gap-3">
                                        <div class="w-5 h-5 rounded-full border-[5px] border-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.5)]"></div>
                                        <span class="font-bold text-white tracking-wide">Credit Card</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <!-- Visa/Mastercard Icons Mock -->
                                        <div class="h-6 w-9 bg-white/10 rounded flex items-center justify-center text-[8px] text-white/50 border border-white/10">VISA</div>
                                        <div class="h-6 w-9 bg-white/10 rounded flex items-center justify-center text-[8px] text-white/50 border border-white/10">MC</div>
                                    </div>
                                </div>
                                <!-- Card Form -->
                                <div class="p-8 space-y-5">
                                     <div class="relative">
                                         <input type="text" name="card_number" value="{{ old('card_number') }}" required class="w-full bg-black/40 border border-cyan-500/20 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 font-mono tracking-wider shadow-inner @error('card_number') border-red-500 @enderror" placeholder="0000 0000 0000 0000">
                                          @error('card_number') <p class="text-red-500 text-xs mt-1 bg-red-500/10 p-2 rounded-lg border border-red-500/20">{{ $message }}</p> @enderror
                                          <svg class="w-5 h-5 absolute right-4 top-1/2 -translate-y-1/2 text-cyan-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
                                     </div>
                                     <div class="grid grid-cols-2 gap-5">
                                         <input type="text" required class="w-full bg-black/40 border border-cyan-500/20 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 shadow-inner" placeholder="MM / YY">
                                         <input type="text" required class="w-full bg-black/40 border border-cyan-500/20 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 shadow-inner" placeholder="CVC">
                                     </div>
                                     <input type="text" required class="w-full bg-black/40 border border-cyan-500/20 rounded-xl px-4 py-3 text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 shadow-inner" placeholder="Cardholder Name">
                                </div>
                            </div>
                        </section>
    
                        <button type="submit" class="w-full py-5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-bold text-lg rounded-full hover:from-cyan-500 hover:to-blue-500 transition-all duration-300 shadow-[0_0_30px_rgba(6,182,212,0.3)] hover:shadow-[0_0_50px_rgba(6,182,212,0.5)] transform hover:-translate-y-1 border border-cyan-400/30">
                            Pay ${{ $cart->items->sum(fn($i) => $i->quantity * $i->product->price) }}
                        </button>
                        
                        <div class="flex items-center justify-center gap-2 text-[10px] text-cyan-400/60 uppercase tracking-widest font-bold">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            <span>Encrypted & Secure</span>
                        </div>
    
                    </form>
                </div>
            </div>

            <!-- Right Column: Deep Neon Summary -->
            <div class="lg:col-span-5">
                <div class="bg-blue-950/40 backdrop-blur-md border border-cyan-500/30 p-8 rounded-[2.5rem] sticky top-32 shadow-[0_0_40px_rgba(30,58,138,0.3)]">
                    <h3 class="font-serif text-2xl text-white mb-8">Your Collection</h3>
                    
                    <div class="space-y-6 mb-8 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @foreach($cart->items as $item)
                        <div class="flex gap-4 items-center group">
                            <div class="relative w-20 h-20 bg-black/60 rounded-2xl shadow-sm border border-white/10 flex-shrink-0 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset($item->product->image) }}" class="w-14 h-14 object-contain group-hover:scale-110 transition-transform duration-500 drop-shadow-[0_0_10px_rgba(255,255,255,0.2)]" alt="{{ $item->product->name }}">
                                <span class="absolute top-1 right-1 w-5 h-5 bg-cyan-500 text-black text-[10px] font-bold rounded-full flex items-center justify-center z-10 box-shadow-[0_0_10px_rgba(6,182,212,0.8)]">{{ $item->quantity }}</span>
                            </div>
                            <div class="flex-grow min-w-0">
                                <h4 class="font-bold text-sm text-white truncate group-hover:text-cyan-400 transition-colors">{{ $item->product->name }}</h4>
                                <p class="text-xs text-white/50 truncate">{{ $item->product->shop->name ?? 'Kettle Collection' }}</p>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <span class="font-serif font-bold text-cyan-400 block drop-shadow-[0_0_5px_rgba(6,182,212,0.5)]">${{ $item->quantity * $item->product->price }}</span>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline-block mt-1">
                                    @csrf
                                    <button type="submit" class="text-[10px] uppercase tracking-wider font-bold text-white/30 hover:text-red-400 transition-colors">Remove</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Discount Code -->
                    <div class="flex gap-2 mb-8">
                        <input type="text" class="flex-grow bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-white/30 focus:bg-black/60 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 shadow-inner" placeholder="Gift card or discount code">
                        <button class="px-6 py-3 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 font-bold uppercase text-xs tracking-wider rounded-xl hover:bg-cyan-500 hover:text-black transition-all duration-300">Apply</button>
                    </div>

                    <div class="space-y-3 pt-6 border-t border-white/10 text-sm text-white/80">
                         <div class="flex justify-between">
                             <span>Subtotal</span>
                             <span class="font-bold">${{ $cart->items->sum(fn($i) => $i->quantity * $i->product->price) }}</span>
                         </div>
                         <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="text-xs text-white/50 italic">Calculated next step</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center pt-6 mt-6 border-t border-white/10">
                        <span class="font-bold text-lg text-white">Total</span>
                        <div class="text-right">
                             <span class="text-[10px] font-bold uppercase text-white/40">USD</span>
                             <div class="font-serif font-bold text-3xl text-cyan-400 leading-none drop-shadow-[0_0_15px_rgba(6,182,212,0.4)]">${{ $cart->items->sum(fn($i) => $i->quantity * $i->product->price) }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
