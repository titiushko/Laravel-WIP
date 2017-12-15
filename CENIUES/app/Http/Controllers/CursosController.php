<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Modulo;
use DB;
use App\Http\Requests\CursoRequest;
use App\Http\Requests\EditCursoRequest;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cursos = Curso::orderBy('id','ASC')->get();

        return view('admin.curso.index')->with('cursos',$cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $curso = new Curso;
        $curso->nombre_curso = $request->nombre_curso;
        $curso->desc_curso = $request->descripcion;
        //Numero de Modulos
        $modu = $request->valor;
    
        $curso->save();

        //Obtiene el ultimo id registrado
        $ultimo_curso = DB::table('cursos')->orderby('id', 'desc')->first();
        //dd($ultimo_curso->id);

        for ($i=1; $i<=$modu; $i++) { 
            
            //Crear 
            $modulo = new modulo;
            //Obteniendo Id de Curso y agregando al modelo
            $modulo->curso_id = $ultimo_curso->id;
            $modulo->nombre_modulo = "Modulo ".$i;
            //print_r($modulo);
            //Guardando 
            $modulo->save();
        }

         //Mensaje de Registro con laracast
        flash("El Curso se creo Satisfactoriamente")->success();
    
        return redirect()->route('cursos.index');
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
        $curso = Curso::find($id);
        //obteniendo la cantidad de modulos para ese curso para setear el campo de numero de modulos en el formulario
        $modulos=DB::table('modulos')->where('curso_id','=',$id)->count('id');
        //dd($modulos);
        //Envia $curso y modulo al formulario de edicion
        return view('admin.curso.edit')->with('curso',$curso)
                                        ->with('modulo',$modulos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCursoRequest $request, $id)
    {
        //creando 
        $curso = Curso::find($id);
        //Obteniendo valores de Formulario y guardando en $curso
        $curso->nombre_curso = $request->nombre_curso;
        $curso->desc_curso = $request->descripcion;
        $curso->save();

        //Obteniendo el numero de modulos del Curso
        $modulos = $request->valor;
        //dd($modulos);

        //Eliminando los modulos asociados al curso
        DB::table('modulos')->where('curso_id', '=', $id)->delete();


        //Crear la nueva cantidad de modulos del curso
        for ($i=1; $i<=$modulos; $i++) { 
            
            //Crear 
            $modulo = new modulo;
            //Obteniendo Id de Curso y agregando al modelo
            $modulo->curso_id = $id; // id del curso actual que se esta editando
            $modulo->nombre_modulo = "Modulo ".$i;
            //print_r($modulo);
            //Guardando 
            $modulo->save();
        }


       //Mensaje
        flash("¡El Curso ".$curso->nombre_curso." a sido editado de forma Exitosa!")->success();

        return redirect()->route('cursos.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        $curso = Curso::find($id);
        //dd($curso);
        $curso->delete();

        //obteniendo el  numero de modelos del curso
         $modulos = $request->valor;
        //dd($modulos);

        //Eliminando los modulos asociados al curso
        DB::table('modulos')->where('curso_id', '=', $id)->delete();
        
      
        //Mensaje
        flash("¡EL Curso ".$curso->nombre_curso." a sido borrado de forma Exitosa!")->warning();

        return redirect()->route('cursos.index');
        
    }

     public function getModulos(Request $request, $id){
        if($request->ajax()){
            $modulos = Modulo::modulos($id);
            return response()->json($modulos);
        }
    }


   
}
