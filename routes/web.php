<?php

use App\Http\Controllers\Clients;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [Clients\HomeController::class, 'index'])->name('home');
Route::controller(Clients\ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.all');
    Route::get('/products/{product}', 'show')->name('products.detail');
});

Route::get('/about', [Clients\AboutController::class, 'index'])->name('about.index');
Route::get('/cart', [Clients\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}', [Clients\CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}/destroy', [Clients\CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cart/{product}/add', [Clients\CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{product}/remove', [Clients\CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [Clients\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [Clients\CheckoutController::class, 'store'])->name('checkout.store');
Route::put('/checkout/{checkout}/cancel', [Clients\CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::get('/profile', [Clients\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [Clients\ProfileController::class, 'update'])->name('profile.update');
Route::get('/orders', [Clients\ProfileController::class, 'orders'])->name('profile.orders');
Route::get('/orders/{order}', [Clients\ProfileController::class, 'orderdetail'])->name('profile.orderdetail');

Route::resource('/wishlist', Clients\WishlistController::class)->only(['index', 'store', 'destroy']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.show');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'request')->name('forgot-password');
    Route::post('/forgot-password', 'send')->name('forgot-password.send');
    Route::get('/reset-password/{token}', 'reset')->name('password.reset');
    Route::post('/reset-password/{token}', 'update')->name('password.update');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.store');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', Admin\CategoryController::class)->except('show');
    Route::resource('products', Admin\ProductController::class);
    Route::resource('users', Admin\UserController::class)->except('show');
    Route::resource('orders', Admin\OrderController::class)->only(['index', 'show']);
});
