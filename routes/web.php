<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


//This will redirect user to login page.
Route::get('/login', function () {

    if (Auth::user()) {
        return redirect()->route('home');
    }
    return view('login');
})->name('login');
