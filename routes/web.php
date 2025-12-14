<?php


use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Unified Auth Portal
Route::get('/login', App\Livewire\Auth\AuthPortal::class)->name('login')->middleware('guest');
Route::get('/register', App\Livewire\Auth\AuthPortal::class)->name('register')->middleware('guest');
// Handled by the component itself, no separate post routes needed for Livewire
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::middleware([
    'auth:web',
    \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
])->group(function () {
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::get('/cart/intent/{product}', [App\Http\Controllers\CartController::class, 'addIntent'])->name('cart.intent');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{item}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{item}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    
    Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');
    Route::get('/order/confirmation/{order}', [App\Http\Controllers\OrderController::class, 'confirmation'])->name('order.confirmation');

    // Dashboard / Profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
});

// Contact Form (Public)
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');



