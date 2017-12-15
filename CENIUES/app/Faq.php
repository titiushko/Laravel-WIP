<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
	protected $table = "faqs";

    protected $fillable = ['user_id','pregunta','respuesta','created_at'];

    // Un Faq pertenece a un Usuario
    public function user(){
    	return $this->belongsTo('App\User');
    }

    
}
