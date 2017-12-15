@extends('templates.public')
@section('title', 'Categorías')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ route('categorias') }}"><i class="fa fa-tag"></i> Categorías</a></li>
            <li><i class="fa fa-medkit"></i> {{ $type }}</li>
        </ol>
    </div>
</div>
<div class="row">
    @if ($clinics->count() > 0)
    @foreach($clinics as $clinic)
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <div class="panel panel-default">
            <div class="panel-body tarjeta">
                <h2>{{ $clinic->name }}</h2>
                <span class="label label-success">{{ $clinic->type->type }}</span>
            </div>
            <div class="panel-footer boton-ver-perfil">
                <a href="{{ route('clinics.show', $clinic->id) }}" class="btn btn-block btn-primary">Ver Perfil</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2>No hay clínicas en está categoría.</h2>
    </div>
    @endif
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        {{ $clinics->render() }}
    </div>
</div>
@endsection