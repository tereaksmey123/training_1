<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // categories

    public static function boot()
    {
        parent::boot();
        static::creating(function($obj) {
           $obj->created_by = \Auth::user()->id ?? 1;
        });

        static::updating(function($obj) {
           $obj->updated_by =  \Auth::user()->id ?? 2;
        });
    }

    // protected $table = 'category'; 
    protected $fillable = ['name', 'created_by', 'updated_by'];
    // public $timestamps = false; // created_at, updated_at

    // Accessory GET

    // MUTator SET
}
