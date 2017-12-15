<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use DB;

class PublicacionesDocenteController extends Controller
{
    

  public function publicado($id)
  {
    //dd('dentro de publicar');
    $articulo = Article::find($id);
    $articulo->estado = 'publicado';
    //dd($article);
    $articulo->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha publicado la Publicación: ".$articulo->titulo." de forma Exitosa")->warning();
    
    return redirect()->route('publicaciones.index');   
  }

  public function oculto($id)
  {
    //dd('dentro de publicar');
    $articulo = Article::find($id);
    $articulo->estado = 'oculto';
    //dd($article);
    $articulo->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha ocultado el Articulo: ".$articulo->titulo." de forma Exitosa")->warning();
    
    return redirect()->route('publicaciones.index');   
  }

  public function index(Request $request){

  	$articulos = DB::table('articles')
            ->join('cursos', 'articles.curso_id', '=', 'cursos.id')
            ->join('modulos', 'articles.modulos_id', '=', 'modulos.id')
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->select('articles.id','articles.titulo','articles.descripcion','articles.estado','users.name', 'users.apellido', 'cursos.nombre_curso', 'modulos.nombre_modulo')
           ->whereNull('users.deleted_at')
           ->where('articles.estado', '=', 'publicado')
           ->get();
           
    return view('admin.noticias.index_publicaciones')
    ->with('articulos',$articulos);
  }


}
