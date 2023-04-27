<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->middleware(['verify.shopify'])->name('home');


Route::get('product', [ProductController::class, 'index'])
        ->name('product.index')
        ->middleware(['verify.shopify']);

Route::get('test', function () {
    $request = request()->all();
    dd($request, Auth::user());
})->middleware(['verify.shopify'])->name('test');
