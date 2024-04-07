<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Table\CategoryController;
use App\Http\Controllers\Table\SliderController;
use App\Http\Controllers\Table\ColorController;
use App\Http\Controllers\Table\CtProductController;
use App\Http\Controllers\Table\ProductController;
use App\Http\Controllers\Table\SizeController;
use App\Models\Category;
use App\Models\CtProduct;
use App\Models\Size;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home.get.index');
});
Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'getIndex'])->name('home.get.index');
    Route::get('/shop', [HomeController::class, 'getShop'])->name('home.get.shop');
    Route::get('/cart', [HomeController::class, 'getCart'])->name('home.get.cart');
    Route::get('/detail/{id}', [HomeController::class, 'getDetail'])->name('home.get.detail');
    Route::post('/cart/add', [CartController::class, 'add'])->name('home.cart.add');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart/minus/{index}', [CartController::class, 'cartMinus'])->name('cart.minus');
    Route::get('/cart/plus/{index}', [CartController::class, 'cartPlus'])->name('cart.plus');
    Route::get('/cart/del/{index}', [CartController::class, 'cartDel'])->name('cart.del');
    Route::get('/checkout', [CartController::class, 'getCartInfo'])->name('home.get.checkout');
    Route::post('/checkout/submit', [CartController::class, 'submit'])->name('order.submit');
    Route::get('/payment', [CartController::class, 'getPayment'])->name('payment');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'getIndex'])->name('admin.get.index');
    Route::resource('cat',CategoryController::class);
    Route::resource('color',ColorController::class);
    Route::resource('size',SizeController::class);
    Route::resource('slider',SliderController::class);
    Route::resource('product',ProductController::class);
    //
    Route::resource('dproduct', CtProductController::class);
    Route::get('dproduct/{idproduct}/{idcolor}/{idsize}/edit', [CtProductController::class, 'edit'])->name('dproduct.edit');
    Route::get('dproduct/{idproduct}/{idcolor}/{idsize}', [CtProductController::class,'show'])->name('dproduct.show');
    Route::put('dproduct/{idproduct}/{idcolor}/{idsize}', [CtProductController::class, 'update'])->name('dproduct.update');
    Route::delete('dproduct/delete/{idproduct}/{idcolor}/{idsize}', [CtProductController::class, 'destroy'])->name('dproduct.destroy');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('dashboard');
        return redirect()->route('home.get.index');
    })->name('dashboard');
});
