<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPriceHistory extends Model
{
    //
    protected $fillable = [
        'product_id', 'old_price', 'new_price', 'created_by', 'updated_by'
    ];

    public function product()
    {
        return $this->belongsto(\App\Models\Product::class, 'product_id', 'id');
        /*
        product_price_histories (main)
        ----
        id 1
        product_id 1


        product
        ----
        id 1

        */
    }
    public function product1()
    {
        return $this->hasOne(\App\Models\Product::class, 'product_price_histories_id');      /*
            product_price_histories (main)
            ----
            id

            product
            ----
            id
            product_price_histories_id

            */  
    }

    public function roles()
    {
        return $this->belongsToMany(4-5);
        // attach, detach, sync
        /*
        user
        ---
        id

        role
        ---
        id

        user_roles
        ---
        user_id
        role_id
        */
    }
}
