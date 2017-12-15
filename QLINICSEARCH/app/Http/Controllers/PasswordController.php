<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Validator;
use Auth;
use App\User;

class PasswordController extends Controller
{
    public function updatePassword(Request $request)
    {
        if ($request->ajax())
        {
            $rules = [
                'mypassword' => 'required',
                'password' => 'required|confirmed|min:6|max:18',
            ];
            $messages = [
                'mypassword.required' => 'El campo es requerido',
                'password.required' => 'El campo es requerido',
                'password.confirmed' => 'Las Contraseñas no coinciden',
                'password.min' => 'El mínimo permitido son 6 caracteres',
                'password.max' => 'El máximo permitido son 18 caracteres',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails())
            {
                return response()->json(['error' => true, 'errores' => $validator]);
            }
            else if (Hash::check($request->mypassword, Auth::user()->password))
            {
                $user = new User;
                $user->where('email', '=', Auth::user()->email)->update(['password' => bcrypt($request->password)]);
                return response()->json(['error' => false, 'mensaje' => 'Su contraseña se cambió exitosamente!']);
            }
            else
            {
                return response()->json(['error' => true, 'mensaje' => 'Contraseña incorrecta o la nueva contraseña no coincide con la confirmación de contraseña!']);
            }
        }
        else
        {
            return Constantes::NO_ES_PETICION_AJAX;
        }
    }
}
