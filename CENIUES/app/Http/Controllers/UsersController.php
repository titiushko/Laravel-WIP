<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PerfilPasswordRequest;
use Validator;
use Auth;
use Hash;


class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response


   */


  //Muestra Usuarios Inactivos
  public function inactivo(Request $request)
  {
      //Mostrar los Usuarios deshabilitados
      $users = User::onlyTrashed()->get();

      return view('admin.users.inactive')->with('users',$users);
  }


  public function index(Request $request)
  {

    //$users = User::orderBy('id','ASC')->where('estado','=','0')->paginate(5);
    $users = User::orderBy('id','ASC')->get();
    return view('admin.users.index')->with('users',$users);
  }


  //Restaura el Usuario eliminado de forma logica
  public function habilitar($id)
  {
        
    //Habilita el Usuario Seleccionado
    $user = User::onlyTrashed()->where('id',$id)->restore();
    
    //Se consulta para construir el mensaje
    $user = User::find($id);
    //dd($user);
    flash("El Usuario ". $user->name." ".$user->apellido." a sido Habilitado")->important();
    
    return redirect()->route('users.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
      return view('admin.users.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserRequest $request)
  {
      //dd($request->all());
      $user = new User($request->all());
      $user->password = bcrypt($request->password);
      $user->save();
      //dd('Usuario Creado');
      //Mensaje de Registro con laracast
      flash("Se ha registrado ".$user->name." de forma Exitosa")->success();
      return redirect()->route('users.index');
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
      $user = User::find($id);
      //dd($user);
      //Envia $user al formulario de edicion
      return view('admin.users.edit')->with('user',$user);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EditUserRequest $request, $id)
  {
    //Datos
    //dd($request->all());
    $user = User::find($id);
    //$user->fill($request->allI());
     
    $user->name   = $request->name;
    $user->apellido = $request->apellido;
    $user->email  = $request->email;
    $user->tel_fijo = $request->tel_fijo;
    $user->tel_movil= $request->tel_movil;
    $user->password = bcrypt($request->password);
    $user->type   = $request->type;
    $user->save();

    flash("El Usuario ".$user->name." a sido editado de forma Exitosa!")->important();
    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //SoftDeletes
    $user = User::find($id);
    //dd($user);
    //$articles = Article::where('user_id','=',$user->id)->where('estado','=','publicado')->get();
    
    $articles = Article::where('user_id','=',$user->id)->where('estado','=','publicado')->update(['estado' => 'oculto']);
    //dd($articles);
    
    $user->delete();  
    //Mensaje
    flash("El Usuario ".$user->name." a sido borrado de forma Exitosa!")->warning();

    return redirect()->route('users.index');
  }


  public function password()
  {
    //return view('docente.password');
    return view('admin.password.password_perfil');
  }

  public function passwordAdmin($id)
  {
    $user = User::find($id);
    //dd($user);
    return view('admin.password.password_admin')->with('user',$user);
  }

   //cambio de password desde admin
  public function updatePassword(PerfilPasswordRequest $request)
  {
    //dd($request->all());
    if (Hash::check($request->mypassword, Auth::user()->password)){
        $user = new User;
        $user->where('email', '=', Auth::user()->email)
             ->update(['password' => bcrypt($request->password)]);

        flash("Se cambio el password de ".$user->name." exitosamente.")->success();
        //return redirect()->route('users.index');     
        return redirect('admin');
    }
    else
    {
        flash("No se pudo cambiar el password, debido a que no confirmo su autenticidad")->error();
        //return redirect()->route('users.index');    
        return redirect('admin');

       // return redirect()->route('docente.password')->with('message', 'Credenciales incorrectas');;
    }
   
  }

  //cambio de password cada usuario
  public function storePassAdmin(PasswordRequest $request)
  {
      //dd($request->all());
      $user = User::find($request->id);
      //dd($user);
      $user->password = bcrypt($request->password);
      $user->save();

      flash("Se cambio el password de ".$user->name." exitosamente.")->success();
      return redirect()->route('users.index');

  }

 

}
