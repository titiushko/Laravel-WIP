<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $table = "imagenes";

    protected $fillable = ['noticia_id','nombre_file','ruta_file'];



    public function noticia(){
    	return $this->belongsTo('App\Noticia');
    }
}
