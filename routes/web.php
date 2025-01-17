<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;
//Breeze profile actions
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::middleware(['auth'])->group(function () {
    // Produse
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    // Pagina de editare a stocului unui produs
    Route::get('/products/{product}/edit-stock', [ProductController::class, 'editStock'])->name('products.editStock');
    Route::patch('/products/{product}/update-stock', [ProductController::class, 'updateStock'])->name('products.updateStock');


    // Coș
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    // Vânzări
    Route::post('/checkout', [SaleController::class, 'checkout'])->name('checkout');
    Route::get('/history', [SaleController::class, 'history'])->name('sales.history');
});

// Authentication Routes
require __DIR__.'/auth.php';