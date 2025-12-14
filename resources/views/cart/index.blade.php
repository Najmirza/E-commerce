@extends('layouts.app')

@section('title', 'Your Cart - Kettle')
@section('forceDarkNav', true)

@section('content')
<!-- Deep Dark Neon Background -->
<div class="min-h-screen pt-32 pb-16 bg-gradient-to-br from-gray-900 via-blue-950 to-black">
    <div class="container mx-auto px-6 md:px-16">
        <h1 class="font-serif text-4xl text-white mb-10 drop-shadow-[0_0_10px_rgba(255,255,255,0.3)]">Your Basket</h1>
    
        @if($cart && $cart->items->count() > 0)
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach($cart->items as $item)
                    <!-- Deep Neon Item Card -->
                    <div id="cart-item-{{ $item->id }}" class="flex gap-6 bg-gray-900/60 backdrop-blur-xl border border-cyan-500/20 p-6 rounded-3xl shadow-[0_0_20px_rgba(6,182,212,0.05)] items-center group hover:bg-gray-900/80 transition-all duration-300">
                        <div class="w-24 h-24 bg-black/40 border border-cyan-500/10 rounded-xl flex-shrink-0 flex items-center justify-center p-2 group-hover:border-cyan-500/30 transition-colors">
                            <img src="{{ asset($item->product->image) }}" class="w-full h-full object-contain drop-shadow-[0_0_5px_rgba(255,255,255,0.1)] group-hover:scale-110 transition-transform duration-500" alt="{{ $item->product->name }}">
                        </div>
                        <div class="flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-bold text-white text-lg group-hover:text-cyan-400 transition-colors">{{ $item->product->name }}</h3>
                                    <p class="text-xs text-white/50">{{ $item->product->shop->name ?? 'Kettle Collection' }}</p>
                                </div>
                                <span class="font-serif font-bold text-xl text-cyan-400 drop-shadow-[0_0_5px_rgba(6,182,212,0.4)]" id="item-total-{{ $item->id }}">${{ number_format($item->quantity * $item->product->price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-end">
                                <div class="flex items-center gap-3">
                                <span class="text-sm text-white/60 font-medium">Qty:</span>
                                <div class="flex items-center bg-black/40 border border-cyan-500/20 rounded-lg">
                                    <button onclick="updateCart('{{ $item->id }}', -1)" class="w-8 h-8 flex items-center justify-center text-cyan-400 hover:text-white hover:bg-cyan-500/20 transition-colors disabled:opacity-30 disabled:cursor-not-allowed" {{ $item->quantity <= 1 ? 'disabled' : '' }} id="btn-minus-{{ $item->id }}">
                                        &minus;
                                    </button>
                                    <span id="qty-{{ $item->id }}" class="w-8 text-center text-white font-bold text-sm">{{ $item->quantity }}</span>
                                    <button onclick="updateCart('{{ $item->id }}', 1)" class="w-8 h-8 flex items-center justify-center text-cyan-400 hover:text-white hover:bg-cyan-500/20 transition-colors">
                                       &plus;
                                    </button>
                                </div>
                            </div>
                            <button onclick="removeFromCart('{{ $item->id }}')" class="text-xs font-bold uppercase tracking-wider text-white/30 hover:text-red-500 transition-colors hover:shadow-[0_0_10px_rgba(239,68,68,0.4)]">Remove</button>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
    
                <!-- Summary -->
                <div class="lg:col-span-1">
                    <!-- Deep Neon Summary Card -->
                    <div class="bg-blue-950/40 backdrop-blur-md border border-cyan-500/30 p-8 rounded-[2rem] shadow-[0_0_40px_rgba(30,58,138,0.2)] sticky top-32">
                        <h3 class="font-bold text-xl text-white mb-6">Order Summary</h3>
                        
                        <div class="space-y-4 text-sm text-white/70 mb-8 border-b border-cyan-500/20 pb-8">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="font-bold text-white" id="cart-subtotal">${{ number_format($cart->items->sum(fn($i) => $i->quantity * $i->product->price), 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span class="text-xs text-white/40 italic">Calculated at checkout</span>
                            </div>
                        </div>
    
                        <div class="flex justify-between font-serif font-bold text-2xl text-white mb-8">
                            <span>Total</span>
                            <span class="text-cyan-400 drop-shadow-[0_0_10px_rgba(6,182,212,0.4)]" id="cart-total">${{ number_format($cart->items->sum(fn($i) => $i->quantity * $i->product->price), 2) }}</span>
                        </div>
    
                        <a href="{{ route('checkout') }}" class="block w-full py-5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white text-center font-bold text-lg rounded-full shadow-[0_0_20px_rgba(6,182,212,0.3)] hover:shadow-[0_0_40px_rgba(6,182,212,0.5)] transform hover:-translate-y-1 transition-all duration-300 border border-cyan-400/30">
                            Proceed to Checkout
                        </a>
                        
                        <div class="flex items-center justify-center gap-2 mt-6 text-[10px] text-cyan-400/40 uppercase tracking-widest font-bold">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            <span>Secure Checkout by Kettle.</span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty State Deep Neon -->
            <div class="text-center py-24">
                <div class="w-20 h-20 bg-black/40 border border-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                </div>
                <h2 class="font-serif text-3xl text-white mb-2 drop-shadow-[0_0_5px_rgba(255,255,255,0.3)]">Your basket is empty</h2>
                <p class="text-white/50 mb-8 font-light">Looks like you haven't discovered our art of boiling yet.</p>
                <a href="{{ route('home') }}" class="inline-block px-8 py-3 bg-cyan-900/40 border border-cyan-500/50 text-cyan-300 font-bold uppercase tracking-wider rounded-full hover:bg-cyan-500 hover:text-black transition-all duration-300 hover:shadow-[0_0_20px_rgba(6,182,212,0.3)]">Start Shopping</a>
            </div>
        @endif
    </div>
</div>

<script>
    function updateCart(itemId, change) {
        const qtySpan = document.getElementById(`qty-${itemId}`);
        const minusBtn = document.getElementById(`btn-minus-${itemId}`);
        let currentQty = parseInt(qtySpan.innerText);
        let newQty = currentQty + change;
        
        if (newQty < 1) return;

        // Optimistic update
        qtySpan.innerText = newQty;
        if (newQty <= 1) {
            minusBtn.disabled = true;
            minusBtn.classList.add('opacity-30', 'cursor-not-allowed');
        } else {
            minusBtn.disabled = false;
            minusBtn.classList.remove('opacity-30', 'cursor-not-allowed');
        }

        fetch(`/cart/update/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ quantity: newQty })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update totals
                document.getElementById('cart-subtotal').innerText = '$' + data.cart_total_formatted;
                document.getElementById('cart-total').innerText = '$' + data.cart_total_formatted;
                // Update Item Line Total
                document.getElementById(`item-total-${itemId}`).innerText = '$' + data.item_total;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Revert on error
            qtySpan.innerText = currentQty;
        });
    }

    function removeFromCart(itemId) {
        if(!confirm('Are you sure you want to remove this item?')) return;

        const itemRow = document.getElementById(`cart-item-${itemId}`);
        
        // Optimistic UI - Fade out
        itemRow.style.transition = 'all 0.5s ease';
        itemRow.style.opacity = '0';
        itemRow.style.transform = 'scale(0.9)';

        fetch(`/cart/remove/${itemId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove from DOM
                setTimeout(() => {
                    itemRow.remove();
                    
                    // If cart empty, reload to show empty state
                    if (data.cart_count === 0) {
                        window.location.reload();
                    }
                }, 300);

                // Update totals
                if (document.getElementById('cart-subtotal')) {
                    document.getElementById('cart-subtotal').innerText = '$' + data.cart_total_formatted;
                    document.getElementById('cart-total').innerText = '$' + data.cart_total_formatted;
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Revert fade out
            itemRow.style.opacity = '1';
            itemRow.style.transform = 'scale(1)';
            alert('Failed to remove item.');
        });
    }
</script>
@endsection
