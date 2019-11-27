<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name', 'code', 'category_id', 'description', 'profile', 'created_by', 'updated_by', 'price'
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function productPriceHistories()
    {
        return $this->hasMany(\App\Models\ProductPriceHistory::class, 'product_id');
    }
   
}
