<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show($slug)
    {
        $shop = Shop::with('products')->where('slug', $slug)->firstOrFail();
        
        return view('shop.show', compact('shop'));
    }
}
