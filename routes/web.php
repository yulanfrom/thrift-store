<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\Courier\DashboardController as CourierDashboardController;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CategoryPageController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ProductDetailController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController as UserOrderController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ProductController::class, 'index'])
    ->name('shop');

Route::get('/categories-page', [CategoryPageController::class, 'index'])->name('categories.page');

Route::get('/category/{id}/products', [CategoryPageController::class, 'show'])->name('category.products');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/product-detail/{id}', [ProductDetailController::class, 'index'])
    ->name('product.detail');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])
        ->name('user.home');

    // My Orders
    Route::get('/my-orders', [UserOrderController::class, 'index'])
        ->name('user.orders');

    // Detail Pesanan
    Route::get('/my-orders/{id}', [UserOrderController::class, 'show'])
        ->name('user.orders.show');

    // Barang diterima
    Route::post('/orders/{id}/complete', [UserOrderController::class, 'complete'])
        ->name('user.orders.complete');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/checkout/cart', [CheckoutController::class, 'cart'])
    ->name('checkout.cart');

    Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
        ->name('checkout');

    Route::post('/checkout/process/{id}', [CheckoutController::class, 'process'])
        ->name('checkout.process');

    Route::post('/checkout/selected', [CheckoutController::class, 'selected'])
    ->name('checkout.selected');

    Route::post('/checkout/selected/process', [CheckoutController::class, 'selectedProcess'])
    ->name('checkout.selected.process');

    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])
    ->name('checkout.success');

    Route::post('/payment/confirm/{id}', [CheckoutController::class, 'confirmPayment'])
    ->name('payment.confirm');

});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', CategoryController::class);

        Route::resource('products', AdminProductController::class);

        Route::resource('orders', OrderController::class);

        Route::get('/reports', [ReportController::class, 'index'])
            ->name('reports.index');

        Route::post('/orders/{id}/verify', [OrderController::class, 'verify'])
    ->name('orders.verify');

    Route::post('/orders/{id}/send-to-courier', [OrderController::class, 'sendToCourier'])
    ->name('orders.sendToCourier');

    Route::post('/orders/{id}/confirm-transfer', [OrderController::class, 'confirmTransfer'])
    ->name('orders.confirmTransfer');

    });

    Route::middleware(['auth'])->group(function () {

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart');

    Route::post('/cart/add/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/cart/{id}/increase', [CartController::class, 'increase'])
        ->name('cart.increase');

    Route::post('/cart/{id}/decrease', [CartController::class, 'decrease'])
        ->name('cart.decrease');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

});

Route::middleware(['auth', 'courier'])
    ->prefix('courier')
    ->name('courier.')
    ->group(function () {

        Route::get('/dashboard', [CourierDashboardController::class, 'index'])
            ->name('dashboard');

        Route::post('/orders/{id}/deliver', [CourierDashboardController::class, 'deliver'])
            ->name('orders.deliver');

        Route::post('/orders/{id}/upload-proof', [CourierDashboardController::class, 'uploadProof'])
            ->name('orders.uploadProof');

        // Upload bukti transfer COD
        Route::post('/orders/{id}/upload-transfer', [CourierDashboardController::class, 'uploadTransfer'])
            ->name('orders.uploadTransfer');

    });

require __DIR__.'/auth.php';