<?php

namespace App\Http\Controllers;

use App\Helpers\Constantes;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Type;
use App\Clinic;
use Auth;

class TypesController extends Controller
{
    public function index()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        return view('administracion.types.index')->with('types', Type::get());
    }

    public function create()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        return view('administracion.types.create');
    }

    public function store(TypeRequest $request)
    {
        $type = new Type($request->all());
        $type->save();
        return redirect()->route('types.index')->with('mensaje_exito', Constantes::CREACION_EXITO('Tipo de Clínica'));
    }

    public function show($id)
    {
        $type = Type::find($id);
        $clinics = Clinic::where('state', '=', Constantes::APROBADO)->where('type_id', '=', $id)->orderBy('id', 'ASC')->paginate(8);
        return view('administracion.types.show')->with(array('type' => $type->type, 'clinics' => $clinics));
    }

    public function edit($id)
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        $type = Type::find($id);
        if ($type == null) return Controller::redirectToContentNotFound();
        return view('administracion.types.edit')->with('type', $type);
    }

    public function update(TypeRequest $request, $id)
    {
        $type = Type::find($id);
        $type->fill($request->all());
        $type->save();
        return redirect()->route('types.index')->with('mensaje_exito', Constantes::MODIFICACION_EXITO('Tipo de Clínica'));
    }

    public function destroy(Request $request, $id)
    {
        if (!Auth::check()) return Controller::redirectToJsonAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToJsonAccessDenied();
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $type = Type::find($id);
        $type->delete();
        return response()->json(['error' => false, 'mensaje' => Constantes::ELIMINACION_EXITO('Tipo de Clínica')]);
    }
}
