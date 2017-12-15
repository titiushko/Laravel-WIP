<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
	protected $table = "comentarios";

    protected $fillable = ['article_id','nombre','email','comentario'];

    //Un comentario pertenece a un articulo
    public function article(){
    	return $this->belongsTo('App\Article');
    }
}
