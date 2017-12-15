<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracast\Flash\Flash;
use App\Curso;
use App\Modulo;
use App\Article;
use App\File;
use DB;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\EditNoticiaRequest;

class ArticlesController extends Controller
{


  public function index()

  {

   
    $articles = DB::table('articles')
            ->join('cursos', 'articles.curso_id', '=', 'cursos.id')
            ->join('modulos', 'articles.modulos_id', '=', 'modulos.id')
            ->select('articles.id','articles.titulo','articles.descripcion','articles.contenido','articles.estado','articles.created_at','cursos.nombre_curso','cursos.desc_curso', 'modulos.nombre_modulo')
            ->where('user_id','=',\Auth::user()->id)
            ->get();
           
    //dd($articles);
      

    return view('admin.articles.index')
    ->with('articles',$articles);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
	  {
      $cursos = Curso::orderBy('nombre_curso','ASC')->pluck('nombre_curso','id');
      return view('admin.articles.create')->with('cursos', $cursos);
	  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ArticleRequest $request)
  {
    //dd($request->all());
    
    //Verifica si es imagen
    if ($request->file('imagen')) {
      $file = $request->file('imagen');
      //Obteniendo la extension del archivo
      $extension = $file->getClientOriginalExtension();
      //nombre de la imagen
      $name = 'ceniues_'.time(). '.'.$file->getClientOriginalExtension();
      //Ruta donde se quiere guardar la imagen, public_path es la direccion donde esta el proyecto
      $path = public_path() . '/img/article_docente/';
      //move guarda la imagen en la ubicacion y nombre indicada
      $file->move($path,$name);
    }
    
    //Guardar en tabla Articles
    $article = new Article($request->all());
    //Obteniendo Id de usuario que crea el articulo
    $article->user_id = \Auth::user()->id;
    //dd($article);
    $article->save();

    //Guardar la imagen en la tabla Imagen
    $file = new File();
    //Nombre del Archivo
    $file->nombre_file = $name;
    //La ruta
    $file->ruta_file = $path;
    //tipo del archivo
    $file->tipo_file = $extension;
    //Obteniendo id de articulo, associate obtiene toma el id que asocia la imagen y el articulo
    $file->article()->associate($article);
    $file->save();

    //dd($file);
    //Mensaje de Registro con laracast
    flash("El Articulo se creo Satisfactoriamente")->success();
    return redirect()->route('articles.index');

  }

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
  public function edit($id)
  {
      $article = Article::find($id);

      $cursos = Curso::orderBy('nombre_curso','ASC')->pluck('nombre_curso','id');

      //Tags que apareceran seteados guardados en un array
      $my_curso = $article->curso->pluck('id')->ToArray();

     // dd($article);
      return view('admin.articles.edit')
                  ->with('cursos',$cursos)
                  ->with('article',$article)
                  ->with('my_curso',$my_curso);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EditNoticiaRequest $request, $id)
  {
    $article = Article::find($id);
    $article->fill($request->all());
    $article->save();
    //dd($article);
    

    //Mensaje de Registro con laracast
    flash("Se ha editado el articulo ".$article->title." de forma Exitosa")->warning();

    return redirect()->route('articles.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $article = Article::find($id);
    //dd($article);
    $article->delete();
    
     //Mensaje de Registro con laracast
    flash("Se ha eliminado el Articulo: ".$article->title." de forma Exitosa")->warning();
    
    return redirect()->route('articles.index');   
  }


  public function getModulos(Request $request, $id){
    //dd($id);
    //Valida si lapeticion es mediante ajax
    if($request->ajax()){
      $modulos = Modulo::modulos($id);
      return response()->json($modulos);
    }
    
  }

  public function publicar($id)
  {
    //dd('dentro de publicar');
    $article = Article::find($id);
    $article->estado = 'publicado';
    //dd($article);
    $article->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha publicado el Articulo: ".$article->titulo." de forma Exitosa")->warning();
    
    return redirect()->route('articles.index');   
  }

  public function ocultar($id)
  {
    //dd('dentro de publicar');
    $article = Article::find($id);
    $article->estado = 'oculto';
    //dd($article);
    $article->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha ocultado el Articulo: ".$article->titulo." de forma Exitosa")->warning();
    
    return redirect()->route('articles.index');   
  }


}
