@extends('templates.main')
@section('title', 'Creación de Ciudad')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><i class="fa fa-file-text-o"></i> Creación de Ciudad</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ route('cities.index') }}"><i class="fa fa-building-o"></i> Ciudades</a></li>
            <li><i class="fa fa-file-text-o"></i> Datos</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Complete los datos requeridos</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route'=>'cities.store', 'method'=>'POST', 'autocomplete'=>'off']) !!}
                    <fieldset>
                        <div class="form-group">
                            {!! Form::label('Nombre') !!}
                            {!! Form::text('name', null, array('required', 'class'=>'form-control')) !!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-floppy-o"></i> Guardar
                            </button>
                            <a href="{{ route('cities.index') }}" class="btn btn-danger">
                                <i class="fa fa-times-circle"></i> Cancelar
                            </a>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection