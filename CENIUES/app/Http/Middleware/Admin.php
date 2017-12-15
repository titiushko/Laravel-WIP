<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
  //
  protected $auth;

  public function __construct(Guard $auth)
  {
      $this->auth = $auth;
  }
  //
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    //dd($this->auth->user()->admin()); 
    //verifica si usuario actualmente autenticado es administrador
    if ($this->auth->user()->admin()) {
      //Si es admin, que continue con la peticion de un modulo o funcion
      return $next($request);
    }else{
      //dd('No puedes acceder, eres de tipo docente');

      //abort(404); //Error cuando no encuentra una ruta

      abort(401); //Error cuando no tiene permisos para acceder a la ruta
    }
      
  }
}
