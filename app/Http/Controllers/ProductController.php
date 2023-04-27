<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {   dd(request()->all(), Auth::user());
        $shop = Auth::user();
        dd($shop);
        $domain = $shop->getDomain()->toNative();
        $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];

        dd("Shop {$domain}'s object:" . json_encode($shop), "Shop {$domain}'s API objct:" . json_encode($shopApi));
    }
}
