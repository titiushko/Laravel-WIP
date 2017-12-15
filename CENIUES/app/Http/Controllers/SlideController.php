<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImgSlideRequest;
use Laracasts\Flash\Flash;


use App\Slider;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Slider::all();
        //dd($images);
        return view('admin.slider.index')->with('images',$images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImgSlideRequest $request)
    {
      //dd($request->all());
      //$nombre = $request->name; 
      if(strstr($request->name, '.', true) == false){
        $nombre = $request->name;
        //dd($nombre.', no trae extension');
      }else{
        $nombre = strstr($request->name, '.', true);
        //dd($nombre.', venia con extension');  
      }
      
      //dd(strlen($nombre));
      
      //Verifica si es imagen
      if ($request->file('imagen')) {
        $file = $request->file('imagen');

        //Obteniendo la extension del archivo
        $extension = $file->getClientOriginalExtension();
        //nombre de la imagen]
        $name = $nombre.'.'.$file->getClientOriginalExtension();
        //$name = 'ceniues_'.time(). '.'.$file->getClientOriginalExtension();
        
        //Ruta donde se quiere guardar la imagen, public_path es la direccion donde esta el proyecto
        $path = public_path() . '/img/slide/';
        $path_2 = url('/') . '/img/slide/'; 
        //dd($path.','.$path_2);
        //move guarda la imagen en la ubicacion y nombre indicada
        $file->move($path,$name);
        
      }

      //Guardar la imagen en la tabla Imagen
      $file = new Slider();
      //Nombre del Archivo
      $file->name = $nombre;
      //La ruta
      $file->url = $path_2;
      //La extension
      $file->ext = $extension;
      $file->save();

      //dd($file);
      //Mensaje de Registro con laracast
      flash("La Imagen se Guardo exitosamente")->success();
      return redirect()->route('slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //dd($id);
      
      $img_slider = Slider::find($id);
      //dd($img_slider);
      
      $img_slider->delete();  
      //Mensaje
      flash("La Imagen ".$img_slider->name.".".$img_slider->ext." a sido borrada de forma Exitosa!")->warning();
      return redirect()->route('slide.index');
    
    }

  public function agregar($id)
  {
    //dd('dentro de agregar '.$id);
    
    $count = Slider::where('estado','=','agregado')->count();

    if ($count == 3) {
      //dd('no puede seguir agregando imagenes');
      //Mensaje de Registro con laracast
      flash("No se pueden agregar mas Imagenes al Slide. El limite es de 3 Imagenes")->error();
      return redirect()->route('slide.index');  
    }else{
      //dd('Puede Agregarla');  
      $img = Slider::find($id);
      $img->estado = 'agregado';
      //dd($img);
      $img->save();
      
      //Mensaje de Registro con laracast
      flash("Se ha agregado la imagen: ".$img->name.".".$img->ext." al Slide")->success();
      return redirect()->route('slide.index');  
    }    
    
  }

  public function quitar($id)
  {
    //dd('dentro de quitar '.$id);
    
    $img = Slider::find($id);
    $img->estado = 'oculto';
    //dd($article);
    $img->save();
    
    //Mensaje de Registro con laracast
    flash("Se ha quitado: ".$img->name.".".$img->ext." del Slide")->important();
    
    return redirect()->route('slide.index');   
    
  }
}
