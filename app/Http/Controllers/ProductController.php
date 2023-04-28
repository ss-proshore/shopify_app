<?php

namespace App\Http\Controllers;

use App\Jobs\SyncProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function syncData()
    {
        SyncProducts::dispatch(Auth::user());

        return Redirect::tokenRedirect('home')->with('success', 'Please wait for some time for data sync.');
    }
}
