<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Faq;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\EditFaqRequest;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $faqs = Faq::orderBy('created_at','ASC')->get();

        return view('admin.faqs.index')->with('faqs',$faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        //
       //dd($request->all());
        //Guardar en tabla Faq
        $faq = new Faq($request->all());
        //Obteniendo Id de usuario
        $faq->user_id = \Auth::user()->id;
        //dd($faq);
        $faq->save();

         //Mensaje de Registro con laracast
        flash("El FAQ se creo Satisfactoriamente")->success();
    
        return redirect()->route('faqs.index');
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
      //
      $faq = Faq::find($id);
      //dd($user);
      //Envia $faq al formulario de edicion
      return view('admin.faqs.edit')->with('faq',$faq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFaqRequest $request, $id)
    {
      $faq = Faq::find($id);
      $faq->fill($request->all());
      $faq->save();

       //Mensaje
      flash("La FAQ seleccionada a sido editada de forma Exitosa!")->success();

      return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $faq = Faq::find($id);
      //dd($faq);
      $faq->delete();
      
      //Mensaje
      flash("La FAQ seleccionada a sido borrada de forma Exitosa!")->warning();

      return redirect()->route('faqs.index');
    }
}
