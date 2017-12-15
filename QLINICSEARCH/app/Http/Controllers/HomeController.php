<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Constantes;
use App\Type;
use App\Clinic;
use App\Valuation;
use Carbon\Carbon;
use Validator;
use Auth;
use Mail;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('publico.welcome')->with('pagina_welcome', true);
    }

    public function home()
    {
        if (!Auth::check()) return Controller::redirectToAuthenticatedDenied();
        if (Auth::user()->role == Constantes::USUARIO) return redirect()->route('clinics.index');
        return view('administracion.home');
    }

    public function comentario(Request $request)
    {
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $reglas = [
            'nombre' => 'min:4|max:255|required|regex:/^[a-zA-Z[:space:]ñáéíóúÑÁÉÍÓÚ]*$/',
            'correo' => 'min:10|max:255|required|string|email',
            'mensaje' => 'min:10|required|string'
        ];
        $mensajes = [
            'nombre.min' => 'Campo nombre: mínimo de caracteres permitido: 4.',
            'nombre.max' => 'Campo nombre: máximo de caracteres permitido: 255.',
            'nombre.required' => 'Campo nombre: es requerido.',
            'nombre.regex' => 'Campo nombre: debe ser solo letras.',
            'correo.min' => 'Campo correo: mínimo de caracteres permitido: 10.',
            'correo.max' => 'Campo correo: máximo de caracteres permitido: 255.',
            'correo.required' => 'Campo correo: es requerido.',
            'correo.email' => 'Campo correo: debe ser un correo válido.',
            'mensaje.min' => 'Campo mensaje: mínimo de caracteres permitido: 10.',
            'mensaje.required' => 'Campo mensaje: es requerido.'
        ];
        $validador = Validator::make($request->all(), $reglas, $mensajes);

        if ($validador->fails())
        {
            return response()->json(['error' => true, 'errores' => $validador]);
        }
        else
        {
            $comentario = new Comentario;
            $comentario->nombre = $request->nombre;
            $comentario->correo = $request->correo;
            $comentario->mensaje = $request->mensaje;
            $comentario->fecha = (Carbon::now())->toDateTimeString();
            Mail::send('mails.contactanos', array('comentario' => $comentario), function ($message) {
                $message->from(env('MAIL_FROM_ADDRESS', 'qlinicsearch@gmail.com'), env('APP_NAME', 'QlinicSearch'));
                $message->to(env('MAIL_TO_ADDRESS', 'qlinicsearch@gmail.com'))->subject('Nuevo Comentario');
            });
            return response()->json(['error' => false, 'mensaje' => 'Gracias por tú comentario!']);
        }
    }

    public function busquedaClinicas(Request $request)
    {
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $clinics = Clinic::join('types', 'clinics.type_id', '=', 'types.id')
        ->select('clinics.id as id', 'clinics.name as name', 'types.type as tag', DB::raw("'Clínicas' as seccion"))
        ->where('clinics.name', 'like', '%'.$request->palabra.'%')
        ->where('clinics.state', '=', Constantes::APROBADO)
        ->take(5)
        ->get();
        $types = Type::select('id as id', 'type as name', DB::raw("'' as seccion"), DB::raw("'Categorías' as seccion"))
        ->where('type', 'like', '%'.$request->palabra.'%')
        ->take(5)
        ->get();
        return response()->json($clinics->merge($types));
    }

    public function resultadoBusquedaClinicas($busqueda = null)
    {
        $clinics = Clinic::where('state', '=', Constantes::APROBADO)->where('name', 'like', '%'.$busqueda.'%')->orderBy('id', 'ASC')->paginate(8);
        return view('publico.clinicas')->with(array('clinics' => $clinics, 'busqueda' => $busqueda));
    }

    public function categorias()
    {
        return view('publico.categorias')->with('types', Type::orderBy('id', 'ASC')->paginate(8));
    }

    public function valoracionClinica(Request $request)
    {
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $rating = new Rating();
        return response()->json(array('error' => false, 'valuetions' => $rating->get($request->id)));
    }

    public function guardarValoracionClinica(Request $request)
    {
        if (!$request->ajax()) return Constantes::NO_ES_PETICION_AJAX;
        $valuation = new Valuation($request->all());
        $valuation->save();
        $rating = new Rating();
        return response()->json(array('error' => false, 'valuetions' => $rating->get($request->clinic_id)));
    }
}

class Rating
{
    public $average = 0.0;
    public $totally = 0.0;

    public function get($clinic_id)
    {
        $summation = 0.0;
        $values = array(1 => 0, 2 => 0, 3 =>0, 4 => 0, 5 => 0);

        $valuetions = Valuation::where('clinic_id', '=', $clinic_id)->get();
        if ($valuetions->count() > 0)
        {
            foreach($valuetions as $valuation)
            {
                $values[$valuation->assessment]++;
                $this->totally++;
            }

            for ($i = 1; $i <= 5; $i++) $summation += $values[$i] * $i;
            $this->average = $summation / $this->totally;
        }

        return $this;
    }
}

class Comentario
{
    public $nombre;
    public $correo;
    public $mensaje;
    public $fecha;
}