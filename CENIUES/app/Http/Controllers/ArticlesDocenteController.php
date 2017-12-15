<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracast\Flash\Flash;
use App\Curso;
use App\Modulo;
use App\Article;
use App\File;
use App\User;
use DB;

class ArticlesDocenteController extends Controller
{
   
  
  
  public function index(Request $request)

  {
   
    $articulos = DB::table('articles')
            ->join('cursos', 'articles.curso_id', '=', 'cursos.id')
            ->join('modulos', 'articles.modulos_id', '=', 'modulos.id')
            ->join('users', 'articles.user_id', '=', 'users.id')
            ->select('articles.id','articles.titulo','articles.descripcion','articles.estado','users.name', 'users.apellido', 'cursos.nombre_curso', 'modulos.nombre_modulo')
           ->where('users.deleted_at','<>', '')
           ->get();
           

           //dd($articulos);
    return view('admin.noticias.index_articles')
    ->with('articulos',$articulos);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
  

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
 

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
 

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $articulo = Article::find($id);
    //dd($article);
    $articulo->delete();
    
     //Mensaje de Registro con laracast
    flash("Se ha eliminado el Articulo: ".$articulo->titulo." de forma Exitosa")->warning();
    
    return redirect()->route('articulos.index');   
  }


  
}
