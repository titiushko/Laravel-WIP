@extends('layouts.app')
@section('content')
<div class="row text-center">
    <div class="col-md-12">
        <h2 class="expediente-sys">QLINICSEARCH</h2>
        <img src="{{ asset('img/logo.png')}}" class="user-image img-responsive"/>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Ingrese sus credenciales para iniciar sesión</strong>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="{{ route('login') }}" autocomplete="off">
            {{ csrf_field() }}
            <div class="form-group input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Su correo electrónico">
            </div>
            <div class="form-group input-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" required placeholder="Su contraseña">
            </div>
            <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
            <a href="{{ url('/home') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>
@endsection