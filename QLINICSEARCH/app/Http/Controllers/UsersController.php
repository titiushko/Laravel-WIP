<?php

namespace App\Http\Controllers;

use App\Helpers\Constantes;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Validator;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function index()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        return view('administracion.usuarios.index')->with('users', User::get());
    }

    public function create()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        return view('administracion.usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $user=auth()->user()->user;
        $user=new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('usuarios.index')->with('mensaje_exito', Constantes::CREACION_EXITO('Usuario'));
    }

    public function edit($id)
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        $user = User::find($id);
        if ($user == null) return Controller::redirectToContentNotFound();
        return view('administracion.usuarios.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect()->route('usuarios.index')->with('mensaje_exito', Constantes::MODIFICACION_EXITO('Usuario'));
    }

    public function destroy(Request $request, $id)
    {
        if (!Auth::check()) return Controller::redirectToJsonAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $usuario = User::find($id);
        $usuario->activo=0;
        $usuario->save();
        return response()->json(['error' => false, 'mensaje' => Constantes::MENSAJE_EXITO('Usuario', 'dió de alta')]);
    }

    public function restore(Request $request, $id)
    {
        if (!Auth::check()) return Controller::redirectToJsonAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return Controller::redirectToAccessDenied();
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $usuario = User::find($id);
        $usuario->activo=1;
        $usuario->save();
        return response()->json(['error' => false, 'mensaje' => Constantes::MENSAJE_EXITO('Usuario', 'dió de baja')]);
    }
}