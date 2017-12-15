<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Clinic extends Model
{
    protected $fillable = [
        'user_id',
        'type_id',
        'city_id',
        'name',
        'services',
        'description',
        'facebook',
        'website',
        'state',
        'address',
        'telephone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function valuations()
    {
        return $this->hasMany('App\Valuation');
    }

    public $mensajesReglas = [
        'name.unique' => 'Nombre ya existe.',
        'facebook.unique' => 'Facebook ya existe.',
        'website.unique' => 'Sitio web ya existe.',
        'address.unique' => 'Dirección ya existe.',
        'telephone.unique' => 'Teléfono ya existe.'
    ];

    public function reglas()
    {
        return [
            'name' => [Rule::unique('clinics')->ignore($this->id)],
            'facebook' => [Rule::unique('clinics')->ignore($this->id)],
            'website' => [Rule::unique('clinics')->ignore($this->id)],
            'address' => [Rule::unique('clinics')->ignore($this->id)],
            'telephone' => [Rule::unique('clinics')->ignore($this->id)]
        ];
    }
}
