<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
