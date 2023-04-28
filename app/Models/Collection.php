<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public $timestamps = FALSE;
    protected $primaryKey = 'collection_id';

    protected $fillable =[
        'collection_id',
        'handle',
        'title',
        'updated_at',
        'published_at',
        'body_html',
        'sort_order',
        'template_suffix',
        'products_count',
        'collection_type',
        'published_scope',
        'admin_graphql_api_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'updated_at' => 'datetime'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'collects', 'collection_id', 'product_id');
    }
}
