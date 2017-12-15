<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
	protected $table = "modulos";

    protected $fillable = ['curso_id','nombre_modulo','desc_modulo'];

    //UN modulo puede estar en varios Cursos
    public function curso(){
    	return $this->belongsTo('App\Curso');
    }

    /*
    public function publicaciones(){
    	return $this->hasMany('App\Article'); 
    }
    */

    public function articles(){
        return $this->hasMany('App\Article'); 
    }

   //obtiene los modulos de un curso
    public static function modulos($id){
        return Modulo::where('curso_id','=', $id)->get();
    }

    
}
