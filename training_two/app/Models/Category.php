<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \App\Models\Category\CategoryTrait;
    // categories

    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($obj) {
    //        $obj->created_by = \Auth::user()->id ?? 1;
    //     });

    //     static::updating(function($obj) {
    //        $obj->updated_by =  \Auth::user()->id ?? 2;
    //     });
    // }

    // public function createdBy()
    // {
    //     return $this->belongsTo(\App\User::class, 'created_by');
    // }
    // public function updatedBy()
    // {
    //     return $this->belongsTo(\App\User::class, 'updated_by');
    // }
    // protected $table = 'category'; 
    protected $fillable = ['name', 'created_by', 'updated_by'];
    // public $timestamps = false; // created_at, updated_at

    // Accessory GET

    // MUTator SET
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'category_id');
    }
}
