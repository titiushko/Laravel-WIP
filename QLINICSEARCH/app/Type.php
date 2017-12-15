<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'type'
    ];

    public function clinics()
    {
        return $this->hasMany('App\Clinic');
    }
}
