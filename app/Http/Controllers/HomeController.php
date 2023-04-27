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

        $response = ApiService::get('collects.json', Auth::user())['collects'];

        foreach($response as $collect) {
            $collect = Collect::updateOrCreate(
                ['collect_id' => $collect['id']],
                [
                    'collection_id' => $collect['collection_id'],
                    'product_id' => $collect['product_id'],
                    'position' => $collect['position'],
                    'sort_value' => $collect['sort_value'],
                    'created_at' => $collect['created_at'],
                    'updated_at' => $collect['updated_at'],
                ]
            );

            $collection = ApiService::get('collections/' . $collect->collection_id. '.json', Auth::user())['collection'];
            Collection::updateOrCreate(
                ['collection_id' => $collect['id']],
                [
                    'handle' => $collection['handle'],
                    'title' => $collection['title'],
                    'updated_at' => $collection['updated_at'],
                    'published_at' => $collection['published_at'],
                    'body_html' => $collection['body_html'],
                    'sort_order' => $collection['sort_order'],
                    'template_suffix' => $collection['template_suffix'],
                    'products_count' => $collection['products_count'],
                    'collection_type' => $collection['collection_type'],
                    'published_scope' => $collection['published_scope'],
                    'admin_graphql_api_id' => $collection['admin_graphql_api_id'],
                ]
            );
        }



        return view('home', compact('update_plan'));
    }
}
