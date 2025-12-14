@extends('layouts.app')

@section('title', 'My Profile - Kettle')
@section('forceDarkNav', true)

@section('content')
<!-- Deep Dark Neon Background -->
<div class="min-h-screen pt-32 pb-16 bg-gradient-to-br from-gray-900 via-blue-950 to-black">
    <div class="container mx-auto px-6 md:px-16">
        <div class="max-w-4xl mx-auto">
            
            <!-- Deep Neon Profile Header -->
            <div class="bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 rounded-[2.5rem] p-8 md:p-12 shadow-[0_0_30px_rgba(6,182,212,0.1)] mb-12 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden group hover:bg-gray-900/80 transition-colors duration-500">
                <div class="absolute inset-0 bg-cyan-500/5 -z-10 bg-grid-white/[0.02]"></div>
                
                <div class="w-32 h-32 bg-black border-2 border-cyan-500/50 text-white rounded-full flex items-center justify-center font-serif text-5xl font-bold shadow-[0_0_20px_rgba(6,182,212,0.3)]">
                    {{ substr($user->name, 0, 1) }}
                </div>
                
                <div class="text-center md:text-left flex-grow">
                    <h1 class="font-serif text-4xl text-white mb-2 drop-shadow-[0_0_5px_rgba(255,255,255,0.5)]">{{ $user->name }}</h1>
                    <p class="text-white/60 text-lg mb-4 font-light">{{ $user->email }}</p>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-black/40 border border-cyan-500/30 rounded-full text-xs font-bold uppercase tracking-widest text-cyan-400 shadow-[0_0_10px_rgba(6,182,212,0.1)]">
                        Member since {{ $user->created_at->format('M Y') }}
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-8 py-3 bg-red-500/10 border border-red-500/30 hover:bg-red-500 hover:text-white text-red-400 rounded-full transition-all duration-300 text-sm font-medium hover:shadow-[0_0_20px_rgba(239,68,68,0.4)] uppercase tracking-wider">
                        Log Out
                    </button>
                </form>
            </div>

            <!-- Dashboard Grid -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Deep Neon Account Details -->
                <div class="bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 p-8 rounded-[2rem] shadow-[0_0_20px_rgba(6,182,212,0.05)]">
                    <h3 class="font-serif text-2xl text-white mb-6 drop-shadow-[0_0_5px_rgba(255,255,255,0.2)]">Account Details</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between border-b border-cyan-500/10 pb-4">
                            <span class="text-white/50">Full Name</span>
                            <span class="font-medium text-white">{{ $user->name }}</span>
                        </div>
                        <div class="flex justify-between border-b border-cyan-500/10 pb-4">
                            <span class="text-white/50">Email</span>
                            <span class="font-medium text-white">{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-between pb-2">
                            <span class="text-white/50">Default Country</span>
                            <span class="font-medium text-white">United States</span>
                        </div>
                    </div>
                </div>

                <!-- Deep Neon Recent Orders -->
                <div class="bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 p-8 rounded-[2rem] shadow-[0_0_20px_rgba(6,182,212,0.05)]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-serif text-2xl text-white drop-shadow-[0_0_5px_rgba(255,255,255,0.2)]">Recent Orders</h3>
                        <a href="{{ route('orders.index') }}" class="text-xs font-bold uppercase tracking-wider text-cyan-400 hover:text-white hover:shadow-[0_0_10px_rgba(6,182,212,0.5)] transition-all">View All</a>
                    </div>

                    @if($recentOrders->count() > 0)
                        <div class="space-y-4">
                            @foreach($recentOrders as $order)
                            <div class="flex items-center justify-between p-4 bg-black/40 border border-cyan-500/10 rounded-xl hover:bg-black/60 hover:border-cyan-500/30 transition-all duration-300 group">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-cyan-900/20 rounded-lg flex items-center justify-center shadow-inner text-xs font-bold text-cyan-400 group-hover:text-white transition-colors">
                                        #{{ substr($order->order_number, -4) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-sm text-white">{{ $order->created_at->format('M d, Y') }}</p>
                                        <p class="text-xs text-white/40">{{ $order->items->count() }} items</p>
                                    </div>
                                </div>
                                <span class="font-bold text-cyan-400 group-hover:drop-shadow-[0_0_5px_rgba(6,182,212,0.6)] transition-all">${{ $order->total_amount }}</span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-12 text-center text-white/30 text-sm font-light">
                            No orders yet.
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
