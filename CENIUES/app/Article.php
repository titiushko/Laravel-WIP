<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;

class Article extends Model
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
  
	protected $table = "articles";

  protected $fillable = ['user_id','modulos_id','titulo','descripcion','contenido','estado', 'slug','curso_id'];

  // Un Articulo pertenece a un Usuario
  public function user(){
  	return $this->belongsTo('App\User');
  }

  // Un Articulo pertenece a un modulo
  public function modulo(){
  	return $this->belongsTo('App\Modulo');
  }

  // Un Articulo pertenece a un modulo
  public function curso(){
      return $this->belongsTo('App\Curso');
  }

  // Un Articulo tiene muchos comentarios
  public function comentarios(){
  	return $this->hasMany('App\Comentario');
  }

  // Un Articulo puede tener files
  public function files(){
  	return $this->hasMany('App\File');
  }

  //obtiene los articulos de curso de ingles
  public static function mod(){
    $articles = DB::table('articles')
                ->join('cursos', 'articles.curso_id', '=', 'cursos.id')
                ->join('modulos', 'articles.modulos_id', '=', 'modulos.id')
                ->select('articles.id',
                          'articles.estado',
                          'cursos.id',
                          'cursos.nombre_curso',
                          'modulos.id',
                          'modulos.nombre_modulo'
                        )
                ->where('articles.estado','=','publicado')
                ->where('cursos.nombre_curso','=','Frances')->get();
      return $articles;
  }

  
   
}
