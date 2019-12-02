<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code', 'price', 'category_id', 'created_by', 'updated_by'];

    public function getPriceFormatAttribute()
    {
        return '$ '.number_format($this->price);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
