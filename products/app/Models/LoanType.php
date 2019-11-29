<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Libraries\MyTypeTrait\MyTypeTrait;

class LoanType extends Model
{
    //
    use MyTypeTrait;
    protected $fillable = ['name'];
    
    public function getCodeAttribute()
    {
        return str_pad($this->id, '6', '0', STR_PAD_LEFT);
    }
}
