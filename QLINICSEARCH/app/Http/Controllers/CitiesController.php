<?php

namespace App\Http\Controllers;

use App\Helpers\Constantes;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\City;
use Auth;

class CitiesController extends Controller
{
    public function index()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        return view('administracion.cities.index')->with('cities', City::get());
    }

    public function create()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        return view('administracion.cities.create');
    }

    public function store(CityRequest $request)
    {
        $city = new City($request->all());
        $city->save();
        return redirect()->route('cities.index')->with('mensaje_exito', Constantes::CREACION_EXITO('Ciudad'));
    }

    public function edit($id)
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        $city = City::find($id);
        if ($city == null) return Controller::redirectToContentNotFound();
        return view('administracion.cities.edit')->with('city', $city);
    }

    public function update(CityRequest $request, $id)
    {
        $city = City::find($id);
        $city->fill($request->all());
        $city->save();
        return redirect()->route('cities.index')->with('mensaje_exito', Constantes::MODIFICACION_EXITO('Ciudad'));
    }

    public function destroy(Request $request, $id)
    {
        if (!Auth::check()) return Controller::redirectToJsonAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToJsonAccessDenied();
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $city = City::find($id);
        $city->delete();
        return response()->json(['error' => false, 'mensaje' => Constantes::ELIMINACION_EXITO('Ciudad')]);
    }
}
