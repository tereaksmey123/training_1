<?php

namespace App\Libraries\MyTypeTrait;
use Illuminate\Database\Eloquent\Builder;

trait MyTypeTrait
{

    public static function BootMyTypeTrait()
    {
        static::creating(function($obj) {
            $obj->created_by = \Auth::user()->id ?? null;
        });
        static::updating(function($obj) {
            $obj->updated_by = \Auth::user()->id ?? null;
        });
        // if (!isset(self::$MyTypeTraitReorderDisable) || !self::$MyTypeTraitReorderDisable) static::addGlobalScope('lft', function (Builder $builder) {
        //     $builder->orderBy('lft');
        // });
        
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
