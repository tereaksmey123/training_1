<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // categories
    // protected $table = 'category'; 
    protected $fillable = ['name', 'created_by', 'updated_by'];
    // public $timestamps = false; // created_at, updated_at

    // Accessory GET

    // MUTator SET
}
