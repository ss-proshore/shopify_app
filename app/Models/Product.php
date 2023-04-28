<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
            'title',
            'product_id',
            'body_html',
            'vendor',
            'product_type',
            'handle',
            'published_at',
            'template_suffix',
            'status',
            'published_scope',
            'tags',
            'admin_graphql_api_id',
            'variants',
            'options',
            'images',
            'image',
    ];

    protected $cast = [
        'image' => 'array',
        'variants' => 'array',
        'images' => 'array',
        'options' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'published_at' => 'datetime'
    ];

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collects', 'product_id', 'collection_id', 'product_id');
    }
}
