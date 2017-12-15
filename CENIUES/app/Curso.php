<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
	protected $table = "cursos";

    protected $fillable = ['nombre_curso','desc_curso'];

    // Un Curso puede tener varios Modulos
    public function modulos(){
    	return $this->hasMany('App\Modulo');
    }

    // Un Curso tiene varios Articulos
    public function articles(){
    	return $this->hasMany('App\Article');
    }
}
