@extends('templates.main')
@section('title', 'Inicio')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><i class="fa fa-home"></i> Inicio</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i> Inicio</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><i class="fa fa-desktop"></i> Administrar</h1>
            </div>
            <div class="panel-body">
                <ul class="list">
                    <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                    <li><a href="{{ route('clinics.index') }}">Clinicas</a></li>
                </ul>
            </div>
        </div>
    </div>
    @if (Auth::user()->role == Constantes::ADMINISTRADOR)
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><i class="fa fa-table"></i> Catalogos</h1>
            </div>
            <div class="panel-body">
                <ul class="list">
                    <li><a href="{{ route('types.index') }}">Tipos de Clinica</a></li>
                    <li><a href="{{ route('cities.index') }}">Ciudades</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection