<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    use HasFactory;

    protected $primaryKey = 'collect_id';

    protected $fillable = [
        'collect_id',
        'collection_id',
        'product_id',
        'position',
        'sort_value',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'collection_id');
    }
}
