<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    protected $fillable = [
        'clinic_id',
        'assessment'
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }
}
