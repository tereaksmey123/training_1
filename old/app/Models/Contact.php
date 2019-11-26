<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contact';
    protected $fillable = [
        'name', 'date', 'contact_type_id'
    ];

    protected $dates = [
        'date' => 'date'
    ];

    public function contactType()
    {
        return $this->belongsTo(\App\Models\ContactType::class, 'contact_types_id');
        // $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }

    public function getCodeAttribute()
    {
        return '00000'.$this->id;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
