<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'clinic_id',
        'days_attention',
        'hours_attention'
    ];

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }
}
