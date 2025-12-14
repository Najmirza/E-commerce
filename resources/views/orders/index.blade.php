@extends('layouts.app')

@section('title', 'My Orders - Kettle')
@section('forceDarkNav', true)

@section('content')
<!-- Deep Dark Neon Background -->
<div class="min-h-screen pt-32 pb-16 bg-gradient-to-br from-gray-900 via-blue-950 to-black">
    <div class="container mx-auto px-6 md:px-16">
        
        <div class="flex items-center gap-2 text-sm text-white/50 mb-8 font-light tracking-wide">
            <a href="{{ route('profile') }}" class="hover:text-cyan-400 transition-colors">My Profile</a>
            <span class="text-cyan-500/50">/</span>
            <span class="text-white font-medium">Orders</span>
        </div>
    
        <h1 class="font-serif text-4xl text-white mb-10 drop-shadow-[0_0_5px_rgba(255,255,255,0.3)]">Order History</h1>
    
        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <!-- Deep Neon Order Card -->
                <div class="bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 rounded-[2rem] p-8 shadow-[0_0_20px_rgba(6,182,212,0.05)] hover:bg-gray-900/80 transition-all duration-300">
                    <div class="flex flex-col md:flex-row justify-between md:items-center gap-6 mb-6 border-b border-cyan-500/10 pb-6">
                        <div class="flex gap-6 items-center">
                            <div class="w-16 h-16 bg-black/40 border border-cyan-500/10 rounded-2xl flex items-center justify-center text-cyan-400 font-bold text-xl shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400/80" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-white">Order <span class="text-cyan-400 font-mono tracking-wider">{{ $order->order_number }}</span></h3>
                                <p class="text-sm text-white/50">Placed on {{ $order->created_at->format('F d, Y') }} at {{ $order->created_at->format('g:i A') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-serif text-2xl font-bold text-white drop-shadow-[0_0_5px_rgba(255,255,255,0.3)]">${{ $order->total_amount }}</p>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-cyan-900/30 text-cyan-400 border border-cyan-500/20 mt-2 shadow-[0_0_10px_rgba(6,182,212,0.1)]">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>
    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($order->items as $item)
                        <div class="flex items-center gap-4 p-4 bg-black/40 border border-cyan-500/5 rounded-xl hover:border-cyan-500/20 transition-colors">
                            <div class="w-12 h-12 bg-gray-900 border border-cyan-500/10 rounded-lg p-1 flex-shrink-0 flex items-center justify-center">
                                 <img src="{{ asset($item->product->image) }}" class="w-full h-full object-contain">
                            </div>
                            <div>
                                <p class="font-bold text-sm text-white group-hover:text-cyan-400 transition-colors">{{ $item->product->name }}</p>
                                <p class="text-xs text-white/50">Qty: {{ $item->quantity }} &times; ${{ $item->price }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Empty State Deep Neon -->
            <div class="text-center py-24 bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 rounded-[2.5rem] shadow-[0_0_20px_rgba(6,182,212,0.05)]">
                <div class="w-16 h-16 bg-black/40 border border-cyan-500/10 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                </div>
                <h2 class="font-serif text-2xl text-white mb-2 drop-shadow-[0_0_5px_rgba(255,255,255,0.3)]">No orders found</h2>
                <p class="text-white/50 mb-8">You haven't purchased anything yet.</p>
                <a href="{{ route('home') }}" class="inline-block px-8 py-3 bg-cyan-900/40 border border-cyan-500/50 text-cyan-300 font-bold uppercase tracking-wider rounded-full hover:bg-cyan-500 hover:text-black transition-all duration-300 hover:shadow-[0_0_20px_rgba(6,182,212,0.3)]">Start Shopping</a>
            </div>
        @endif
    </div>
</div>
@endsection
