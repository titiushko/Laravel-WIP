<?php

namespace App\Http\Controllers;

use App\Helpers\Constantes;
use Illuminate\Http\Request;
use App\Http\Requests\ClinicRequest;
use App\Clinic;
use App\Type;
use App\City;
use Auth;

class ClinicsController extends Controller
{
    public function index()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO)
        {
            $clinics = Clinic::where('user_id', '=', Auth::user()->id)->get();
        }
        else
        {
            $clinics = Clinic::get();
        }
        return view('administracion.clinics.index')->with('clinics', $clinics);
    }

    public function create()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::ADMINISTRADOR) return Controller::redirectToAccessDenied();
        return view('administracion.clinics.create')->with(array(
            'types' => Type::orderBy('type', 'ASC')->pluck('type', 'id'),
            'cites' => City::orderBy('name', 'ASC')->pluck('name', 'id')
        ));
    }

    public function store(ClinicRequest $request)
    {
        $clinic = new Clinic($request->all());
        $this->validate($request, $clinic->reglas(), $clinic->mensajesReglas);
        $clinic->state = Constantes::PENDIENTE;
        $clinic->user_id = Auth::user()->id;
        $clinic->save();
        return redirect()->route('clinics.index')->with('mensaje_exito', Constantes::CREACION_EXITO('Clínica'));
    }

    public function show($id)
    {
        $clinic = Clinic::find($id);
        if ($clinic == null || $clinic->state == Constantes::PENDIENTE) return Controller::redirectToContentNotFound();
        return view('administracion.clinics.show')->with(array('clinic' => $clinic));
    }

    public function edit($id)
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        $clinic = Clinic::find($id);
        if ($clinic == null) return Controller::redirectToContentNotFound();
        return view('administracion.clinics.edit')->with(array(
            'clinic' => $clinic,
            'types' => Type::orderBy('type', 'ASC')->pluck('type', 'id'),
            'cites' => City::orderBy('name', 'ASC')->pluck('name', 'id')
        ));
    }

    public function update(ClinicRequest $request, $id)
    {
        $clinic = Clinic::find($id);
        $this->validate($request, $clinic->reglas(), $clinic->mensajesReglas);
        $clinic->fill($request->all());
        $clinic->save();
        return redirect()->route('clinics.index')->with('mensaje_exito', Constantes::MODIFICACION_EXITO('Clínica'));
    }

    public function destroy(Request $request, $id)
    {
        if (!Auth::check()) return Controller::redirectToJsonAuthenticatedDenied();
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $clinic = Clinic::find($id);
        $clinic->delete();
        return response()->json(['error' => false, 'mensaje' => Constantes::ELIMINACION_EXITO('Clínica')]);
    }

    public function changeState(Request $request)
    {
        if (!Auth::check()) return Controller::redirectToJsonAuthenticatedDenied();
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $clinic = Clinic::find($request->id);
        $clinic->state = $request->state;
        $clinic->save();
        return response()->json(['error' => false, 'mensaje' => Constantes::MENSAJE_EXITO('Clínica', 'cambió el estado a '.$request->state)]);
    }
}
