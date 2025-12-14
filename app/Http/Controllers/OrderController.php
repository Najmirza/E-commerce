<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                      ->with('items.product')
                      ->latest()
                      ->get();

        return view('orders.index', compact('orders'));
    }

    public function checkout()
    {
        $cart = Cart::with('items')->where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart');
        }

        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'card_number' => 'required|string|min:16', // Simple validation
        ]);

        $cart = Cart::with('items.product')->where('user_id', Auth::id())->firstOrFail();
        $total = $cart->items->sum(fn($i) => $i->quantity * $i->product->price);

        // Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $total,
            'status' => 'processing',
            'payment_status' => 'paid',
            'shipping_address' => $request->address,
            'shipping_city' => $request->city,
            'shipping_zip' => $request->zip,
        ]);

        // Move Items
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Clear Cart
        $cart->items()->delete();
        $cart->delete();

        return redirect()->route('order.confirmation', $order->id);
    }

    public function confirmation(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        
        $order->load('items.product');

        return view('order.confirmation', compact('order'));
    }
}
