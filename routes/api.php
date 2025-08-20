<?php
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;

Route::post('/sellers', [SellerController::class, 'store']);
Route::post('/products', [ProductController::class, 'store']);
