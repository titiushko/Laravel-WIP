<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Noticia;
use App\Imagen;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use App\Http\Requests\NoticiaRequest;

class NoticiasController extends Controller
{
     public function index(Request $request)
  {

    $noticias = Noticia::orderBy('id', 'ASC')->get();
    $noticias->each(function($noticias){
    $noticias->user;
    });

   
    return view('admin.noticias.index')->with('noticias', $noticias);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
	  {
      //return view('admin.noticias.create');
      return view('admin.noticias.create',compact('cursos'));
	  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(NoticiaRequest $request)
  {


    if($request->file('imagen'))
     {

      $file = $request->file('imagen');
      $name = 'CENIUES_' . time() . '.' . $file->getClientOriginalExtension();
      $path = public_path().'/imagenes/noticia/';
      $file->move($path, $name);
      
     } 

     $noticia = new Noticia($request->all());
     $noticia->user_id = \Auth::user()->id;
     $noticia->save();

     $imagen = new Imagen();
     $imagen->nombre_file = $name;
     $imagen->ruta_file=$path;
     $imagen->noticia()->associate($noticia);
     $imagen->save();

     Flash::success('¡Se ha creado la noticia ' .$noticia->titulo . ' de forma satisfactoria!');
     return redirect()->route('noticias.index');
     
  

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
	     $noticia= Noticia::find($id);
       return view("admin.noticias.edit")->with('noticias', $noticia); 
	  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  	{
      $noticia = Noticia::find($id);
      $noticia->fill($request->all());
      
      $noticia->save();

      Flash::warning('¡Se ha editado la noticia '. $noticia->titulo . ' de forma exitosa!');
      return redirect()->route('noticias.index');
  	}

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $noticia = Noticia::find($id);
    $noticia->delete();

    Flash::error('¡Se ha borrado la noticia ' .$noticia->titulo . ' de forma exitosa!');
    return redirect()->route('noticias.index');
  }

  public function publicar($id)
  {
    //dd('dentro de publicar');
    $noticia = Noticia::find($id);
    $noticia->estado = 'publicado';
    //dd($noticia);
    $noticia->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha publicado la Noticia: ".$noticia->titulo." de forma Exitosa")->warning();
    return redirect()->route('noticias.index');   
  }

  public function ocultar($id)
  {
    //dd('dentro de ocultar');
    $noticia = Noticia::find($id);
    $noticia->estado = 'oculto';
    //dd($article);
    $noticia->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha ocultado el Articulo: ".$noticia->titulo." de forma Exitosa")->warning();
    return redirect()->route('noticias.index');   
  }

}
