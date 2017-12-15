<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'clinic_id',
        'name'
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }
}
