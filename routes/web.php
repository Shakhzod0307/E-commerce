<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[HomeController::class, 'index'])->name('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware'=>'auth'],function(){

    Route::get('/redirect',[HomeController::class, 'redirect'])->name('redirect');
    Route::get('/view/category',[CategoryController::class, 'index'])->name('view_category');
    Route::get('/add/category',[CategoryController::class, 'create'])->name('add_category');
    Route::post('/add/category',[CategoryController::class, 'store'])->name('store_category');
    Route::get('/edit/category/{id}',[CategoryController::class, 'edit'])->name('edit_category');
    Route::post('/edit/category/{id}',[CategoryController::class, 'update'])->name('update_category');
    Route::get('/delete/category/{id}',[CategoryController::class, 'destroy'])->name('delete_category');


    Route::get('/search/data',[AdminController::class, 'search_data'])->name('search_data');

    Route::get('/dashboard/orders',[AdminController::class, 'index'])->name('orders_admin');
    Route::get('/delivered/{id}',[AdminController::class, 'delivered'])->name('delivered_admin');

    Route::get('/print/order/{id}',[AdminController::class, 'print_order'])->name('print_order');


    Route::get('/dashboard/products',[ProductController::class, 'index'])->name('products');
    Route::get('/add/product',[ProductController::class, 'create'])->name('add_product');
    Route::post('/add/product',[ProductController::class, 'store'])->name('store_product');

    Route::get('/edit/product/{id}',[ProductController::class, 'edit'])->name('edit_product');
    Route::post('/update/product/{id}',[ProductController::class, 'update'])->name('update_product');
    Route::get('/delete/product/{id}',[ProductController::class, 'destroy'])->name('destroy_product');

    Route::post('/add/cart/{id}',[HomeController::class, 'add_cart'])->name('add_cart');
    Route::get('/show/cart',[HomeController::class, 'show_cart'])->name('show_cart');
    Route::get('/delete/cart/{id}',[HomeController::class, 'delete_cart'])->name('delete_cart');

    Route::get('/orders',[HomeController::class, 'user_order'])->name('user_order');
    Route::get('/order/cancel/{id}',[HomeController::class, 'user_order_cancel'])->name('user_order_cancel');


    Route::get('/search/product',[HomeController::class, 'search_product'])->name('search_product');


    Route::get('/cash/order',[HomeController::class, 'cash_order'])->name('cash_order');

    Route::get('/stripe/{total_price}',[HomeController::class, 'stripe'])->name('stripe');
    Route::post('stripe/{total_price}', [HomeController::class,'stripePost'])->name('stripe.post');
});
    Route::get('/show/product/{id}',[HomeController::class, 'show'])->name('show_product');







