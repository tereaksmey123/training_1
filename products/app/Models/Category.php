<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    
    protected $fillable = ['name'];

    public function getCodeAttribute()
    {
        return str_pad($this->id, '6', '0', STR_PAD_LEFT);
    }
    
    public function getNameFormatAttribute()
    {
        return strtoupper($this->name);
    }
}
