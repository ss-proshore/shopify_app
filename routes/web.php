<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Middleware\ThrottleRequests;

Route::get('/', HomeController::class)->middleware(['verify.shopify'])->name('home');

Route::get('syncData', [ProductController::class, 'syncData'])
        ->middleware(['verify.shopify', ThrottleRequests::class.':1,1440'])
        ->name('product.sync');
