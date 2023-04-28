<?php

namespace App\Jobs;

use App\Models\Collect;
use App\Models\Collection;
use App\Models\Product;
use App\Services\ApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SyncProducts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = ApiService::get('products.json', $this->user)['products'];

        foreach($response as $product) {
            Product::updateOrCreate(
                ['handle' => $product['handle']],
                [
                    'title' => $product['title'],
                    'product_id' => $product['id'],
                    'body_html' => $product['body_html'],
                    'vendor' => $product['vendor'],
                    'product_type' => $product['product_type'],
                    'published_at' => $product['published_at'],
                    'template_suffix' => $product['template_suffix'],
                    'status' => $product['status'],
                    'published_scope' => $product['published_scope'],
                    'tags' => $product['tags'],
                    'admin_graphql_api_id' => $product['admin_graphql_api_id'],
                    'variants' => json_encode($product['variants']),
                    'options' => json_encode($product['options']),
                    'images' => json_encode($product['images']),
                    'image' => json_encode($product['image']),
                ]
            );
        }
        Log::info("All product updated");

        $response = ApiService::get('collects.json', $this->user)['collects'];

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

            $collection = ApiService::get('collections/' . $collect->collection_id. '.json', $this->user)['collection'];
            Collection::updateOrCreate(
                ['collection_id' => $collection['id']],
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
    }
}
