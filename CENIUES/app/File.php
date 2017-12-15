<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $table = "files";

    protected $fillable = ['article_id','nombre_file','ruta_file','tipo_file'];

    // Un file puede estar en varios Articulos
    public function article(){
    	return $this->belongsTo('App\Article');
    }

    
}
