@extends('templates.public')
@section('title', 'Clínicas')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><i class="fa fa-tag"></i> Categorías</li>
        </ol>
    </div>
</div>
<div class="row">
    @foreach($types as $type)
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <div class="panel panel-default">
            <div class="panel-body tarjeta">
                <h2>{{ $type->type }}</h2>
            </div>
            <div class="panel-footer boton-ver-perfil">
                <a href="{{ route('types.show', $type->id) }}" class="btn btn-block btn-primary">Ver {{ $type->clinics->count() }} Clínicas</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        {{ $types->render() }}
    </div>
</div>
@endsection