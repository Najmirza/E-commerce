@extends('layouts.app')

@section('title', 'Order Confirmed - Kettle')

@section('content')
@section('forceDarkNav', true)

@section('content')
<!-- Deep Dark Neon Background -->
<div class="min-h-screen pt-32 pb-16 bg-gradient-to-br from-gray-900 via-blue-950 to-black flex items-center justify-center">
    <!-- Deep Neon Receipt Card -->
    <div class="max-w-lg w-full bg-gray-900/60 backdrop-blur-xl border border-cyan-500/30 p-10 rounded-[2.5rem] shadow-[0_0_50px_rgba(6,182,212,0.15)] relative overflow-hidden">
        
        <!-- Glowing Top Border -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-400 via-blue-500 to-cyan-400 shadow-[0_0_20px_rgba(6,182,212,0.5)]"></div>
        
        <div class="text-center mb-10">
            <!-- Success Icon -->
            <div class="w-24 h-24 bg-black/40 border border-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-[0_0_30px_rgba(6,182,212,0.2)]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-cyan-400 drop-shadow-[0_0_10px_rgba(6,182,212,0.8)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            </div>
            
            <h1 class="font-serif text-3xl font-bold text-white mb-2 drop-shadow-[0_0_10px_rgba(255,255,255,0.3)]">Payment Successful</h1>
            <p class="text-white/50 text-sm tracking-wide">Thank you for your purchase.</p>
        </div>

        <!-- Order Details Glass Box -->
        <div class="bg-black/40 border border-white/5 p-6 rounded-2xl mb-8 shadow-inner">
            <div class="flex justify-between text-sm text-white/60 mb-3 border-b border-white/10 pb-3">
                <span class="uppercase tracking-wider text-[10px] font-bold">Order Number</span>
                <span class="font-mono font-bold text-cyan-400 drop-shadow-[0_0_5px_rgba(6,182,212,0.4)]">{{ $order->order_number }}</span>
            </div>
            <div class="flex justify-between text-sm text-white/60">
                <span class="uppercase tracking-wider text-[10px] font-bold">Date</span>
                <span class="text-white">{{ $order->created_at->format('M d, Y') }}</span>
            </div>
        </div>

        <div class="space-y-4 mb-8">
            <h3 class="font-bold text-[10px] uppercase tracking-[0.2em] text-white/40 border-b border-white/10 pb-3 mb-4">Items Purchased</h3>
            @foreach($order->items as $item)
            <div class="flex justify-between items-center text-sm group">
                <div class="flex items-center gap-3">
                    <!-- Tiny Image Thumbnail -->
                    <div class="w-10 h-10 bg-black/60 rounded-lg flex items-center justify-center border border-white/10">
                         <img src="{{ asset($item->product->image) }}" class="w-8 h-8 object-contain opacity-80 group-hover:opacity-100 transition-opacity">
                    </div>
                    <div>
                        <span class="font-bold text-white block group-hover:text-cyan-400 transition-colors">{{ $item->product->name }}</span>
                        <span class="text-[10px] text-white/40 uppercase tracking-wider">Qty: {{ $item->quantity }}</span>
                    </div>
                </div>
                <span class="font-bold text-white/80 font-mono">${{ number_format($item->price * $item->quantity, 2) }}</span>
            </div>
            @endforeach
        </div>

        <!-- Total -->
        <div class="flex justify-between items-center border-t border-dashed border-cyan-500/30 pt-6 mb-8">
            <span class="font-bold text-lg text-white">Total Paid</span>
            <span class="font-serif font-bold text-3xl text-cyan-400 drop-shadow-[0_0_15px_rgba(6,182,212,0.4)]">${{ number_format($order->total_amount, 2) }}</span>
        </div>

        <!-- Action Button -->
        <a href="{{ route('home') }}" class="block w-full py-4 bg-cyan-900/30 border border-cyan-500/50 text-cyan-400 hover:bg-cyan-500 hover:text-black hover:border-cyan-500 text-center font-bold tracking-wider uppercase text-sm rounded-full transition-all duration-300 shadow-[0_0_20px_rgba(6,182,212,0.1)] hover:shadow-[0_0_40px_rgba(6,182,212,0.4)]">
            Continue Shopping
        </a>
    </div>
</div>
@endsection
