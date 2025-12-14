<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['items.product', 'items.product.shop'])->where('user_id', Auth::id())->first();
        
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id()],
            ['session_id' => session()->getId()]
        );

        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Item added to cart successfully!']);
        }

        return redirect()->route('checkout');
    }
    public function remove(Request $request, CartItem $item)
    {
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        // Recalculate totals
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartTotal = $cart ? $cart->items->sum(function($i) {
            return $i->quantity * $i->product->price;
        }) : 0;

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart_total' => $cartTotal,
                'cart_total_formatted' => number_format($cartTotal, 2),
                'cart_count' => $cart ? $cart->items->count() : 0
            ]);
        }

        return back()->with('status', 'Item removed from cart.');
    }

    public function update(Request $request, CartItem $item)
    {
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item->update(['quantity' => $request->quantity]);

        // Recalculate totals
        $cart = $item->cart;
        $cartTotal = $cart->items->sum(function($i) {
            return $i->quantity * $i->product->price;
        });

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart_total' => $cartTotal,
                'cart_total_formatted' => number_format($cartTotal, 2),
                'item_quantity' => $item->quantity,
                'item_total' => number_format($item->quantity * $item->product->price, 2)
            ]);
        }

        return back()->with('status', 'Cart updated.');
    }

    public function addIntent(Product $product)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id()],
            ['session_id' => session()->getId()]
        );

        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('checkout');
    }
}
