<?php

namespace App\Libraries;

class ProductLib
{

    public static function createProductPriceHistories($new, $old = false)
    {
        $data['new_price'] = $new->price;

        if ($old) {
            if ($new->price != $old->price) {
                $data['old_price'] = $old->price;
                $new->productPriceHistories()->create($data);
            }
        } else {
            if ($new->price) $new->productPriceHistories()->create($data);
        }
    }
}