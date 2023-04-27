<?php

namespace App\Http\Controllers;

use App\Models\Plan;
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

        $upgrade_plan = Plan::where('id', '!=', Auth::user()->plan_id)->pluck('id')->toArray();
        return view('home', compact('upgrade_plan'));

    }
}
