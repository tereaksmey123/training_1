<?php

namespace App\Models\Category;

trait CategoryTrait
{
    public static function BootCategoryTrait()
    {
        static::creating(function($obj) {
            $obj->created_by = \Auth::user()->id ?? 5;
        });

        static::updating(function($obj) {
            $obj->updated_by =  \Auth::user()->id ?? 2;
        });
        
    }
    
    public function createdBy()
    {
        return $this->belongsTo(\App\User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(\App\User::class, 'updated_by');
    }

}