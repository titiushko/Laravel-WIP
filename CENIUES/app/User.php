<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name','apellido', 'email', 'password', 'type', 'estado','tel_fijo','tel_movil'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    // Un Usuario tiene muchas Faqs
    public function faqs(){
        return $this->hasMany('App\Faq');
    }

    // Un Usuario tiene muchos Articulos
    public function articles(){
        return $this->hasMany('App\Article');
    }

    //con esta duncion se valida si usuario es administrador 
    public function admin()
    {
      return $this->type === 'admin';
    }


    

}


