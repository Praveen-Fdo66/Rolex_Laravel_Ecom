<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;







Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/products', [ProductController::class, 'new_watches'])->name('products.new_watches');

Route::middleware(['admin'])->group(function () {
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});


Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{id}', [CheckoutController::class, 'show'])->name('checkout.show');
});


Route::post('/checkout/process/{id}', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/products/checkout/reserved', function () {
    $productName = session('product');
    return view('products.checkout.reserved', compact('productName'));
})->name('products.checkout.reserved');

// Route::get('products/checkout/reserved', function () {
//     $productName = session('productName');
//     if (!$productName) {
//         return redirect()->route('products.checkout.reserved')->with('productName', $product->name);

//     }
//     return view('products.checkout.reserved', compact('productName'));
// })->name('checkout.reserved');

// Route::get('products/checkout/reserved', function () {
//     $productName = session('productName');
//     if (!$productName) {
//         return redirect()->route('home');
//     }
//     return view('products.checkout.reserved', compact('productName'));
    
// })->name('checkout.reserved');




Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/registered-users', [RegisteredUserController::class, 'index'])->name('admin.registeredUsers.index');
});




Route::middleware(['auth', 'user.only'])->group(function () {
    Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});






Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('about', function () {
    return view('about');
})->name('about');











require __DIR__.'/auth.php';
