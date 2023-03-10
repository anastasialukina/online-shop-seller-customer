<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);

    Route::group(['middleware' => 'checkRole:customer'], function () {
        //show - show product details
        //Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

        //make - show form to make order
        Route::get('/orders/make', [OrderController::class, 'create'])->name('orders.create');
        //store - store order
        Route::post('/orders/make', [OrderController::class, 'store'])->name('orders.store');
    });
    Route::group(['middleware' => 'checkRole:seller'], function () {
        //create - show form to create product
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        //store - store product
        Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');

        //show - show product details
        //Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    });

    //index - show all orders for customer (all customer's orders)
    //or show all orders for seller (only seller's orders)
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    //index - show all products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
