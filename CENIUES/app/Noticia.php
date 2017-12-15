<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Noticia extends Model
{

  use Sluggable;

  public function sluggable()
  {
    return [
        'slug' => [
            'source' => 'titulo'
        ]
    ];
  }

	protected $table = "noticias";

  protected $fillable = ['user_id','titulo','descripcion','contenido','estado', 'slug'];

  // Un Articulo pertenece a un Usuario
  public function user(){
  	return $this->belongsTo('App\User');
  }

    
  // Un Articulo puede tener files
  public function imagenes(){
   	return $this->hasMany('App\Imagen');
  }

  

  /*public function curso(){
   return $this->belongsTo('App\Curso','id');
  }

   public function modulo(){
    return $this->belongsTo('App\Modulo', 'id');
   }*/
 
    //https://es.stackoverflow.com/questions/22726/laravel-llenar-un-select-con-valores-de-tablas-con-llave-foranea
}
