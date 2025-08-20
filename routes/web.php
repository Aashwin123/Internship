<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/form','create');
 Route::post('/sellers',[SellerController::class,'store'])->name('sellers.store');
 Route::post('/products',[ProductController::class,'store'])->name('products.store');
//web.php ma route garexii blade bata data lina milxa