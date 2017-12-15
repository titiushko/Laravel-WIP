<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use App\Helpers\Constantes;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectToAuthenticatedDenied()
    {
        return redirect()->route('login')->with('mensaje_error', Constantes::ACCESO_DENEGADO);
    }

    public function redirectToJsonAuthenticatedDenied()
    {
        return response()->json(['error' => 'AutenticacionDenegada', 'mensaje' => Constantes::ACCESO_DENEGADO]);
    }

    public function redirectToAccessDenied()
    {
        return redirect()->route('clinics.index')->with('mensaje_error', Constantes::PRIVILEGIO_DENEGADO(Route::getFacadeRoot()->current()->uri()));
    }

    public function redirectToJsonAccessDenied()
    {
        return response()->json(['error' => 'AccesoDenegado', 'mensaje' => Constantes::PRIVILEGIO_DENEGADO(Route::getFacadeRoot()->current()->uri())]);
    }

    public function redirectToContentNotFound()
    {
        return view('publico.error404');
    }
}
