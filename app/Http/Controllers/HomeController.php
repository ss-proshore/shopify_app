<?php

namespace App\Http\Controllers;

use App\Jobs\SyncProducts;
use App\Models\Collect;
use App\Models\Collection;
use App\Models\Plan;
use App\Models\Product;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        if(!$user->plan_id) {
            $plans = Plan::select('id','name', 'price', 'interval', 'trial_days')->get();
            return view('welcome', compact('plans'));
        }

        $update_plan = Plan::where('id', '!=', Auth::user()->plan_id)->first()->id;

        // SyncProducts::dispatch(Auth::user());

        $product = Product::whereHas('collections')->with('collections')->get()->toArray();
        dd($product);

        return view('home', compact('update_plan'));
    }
}
