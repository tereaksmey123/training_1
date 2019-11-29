<?php

namespace App\Models;
use App\Libraries\MyTypeTrait\MyTypeTrait;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use MyTypeTrait;

    public static function boot()
    {
        parent::boot();
        // code
        // created_by
        // updated_by

        static::created(function($obj) {
            // self::find($obj->id)->update([

            // ]);
            $obj->code = str_pad($obj->id, '6', '0', STR_PAD_LEFT);
            $obj->save();
        });
    }
    // public function createdBy()
    // {
    //     return $this->belongsTo(\App\User::class, 'created_by');
    // }
    // public function updatedBy()
    // {
    //     return $this->belongsTo(\App\User::class, 'updated_by');
    // }
    
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
