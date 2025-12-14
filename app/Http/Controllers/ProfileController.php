<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Get recent orders for the dashboard summary
        $recentOrders = Order::where('user_id', $user->id)
                            ->with('items.product')
                            ->latest()
                            ->take(3)
                            ->get();

        return view('profile.index', compact('user', 'recentOrders'));
    }
}
