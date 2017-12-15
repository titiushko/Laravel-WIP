@extends('templates.public')
@section('title', 'Perfil de la Clínica')
@section('content')
<link href="{{ asset('css/plugins/star-rating/star-rating.min.css')}}" rel="stylesheet" />
<style type="text/css">
	div.form-control {
		height: initial !important;
		margin-bottom: 20px;
	}
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ route('categorias') }}"><i class="fa fa-tag"></i> Categorías</a></li>
            <li><i class="fa fa-medkit"></i> <a href="{{ route('types.show', $clinic->type_id) }}">{{ $clinic->type->type }}</a></li>
            <li><i class="fa fa-ambulance"></i> {{ $clinic->name }}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Valoración</h3>
            </div>
            <div class="panel-body" id="valoracion">
                <input type="number" data-min="0" data-max="5" data-step="0.1" data-size="xs" />
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información</h3>
            </div>
            <div class="panel-body">
                <fieldset>
                    {{ Form::hidden('id', $clinic->id, array('id'=>'id')) }}
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Nombre') !!}
                                <div class="form-control">{{ $clinic->name }}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Tipos de Clínica') !!}
                                <div class="form-control">{{ $clinic->type->type }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Teléfono') !!}
                                <div class="form-control">{{ $clinic->telephone }}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Ciudad') !!}
                                <div class="form-control">{{ $clinic->city->name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Sitio Web') !!}
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                    <div class="form-control"><a href="{{ $clinic->website }}" target="_blank">{{ $clinic->website }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                {!! Form::label('Facebook') !!}
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <div class="form-control"><a href="{{ $clinic->facebook }}" target="_blank">{{ $clinic->facebook }}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Servicios') !!}
                                <div class="form-control">{!! $clinic->services !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Descripción') !!}
                                <div class="form-control">{!! $clinic->description !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Dirección') !!}
                                <div class="form-control">{!! $clinic->address !!}</div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Valora está Clínica</h3>
            </div>
            <div class="panel-body" id="valorar">
                <input type="number" data-min="0" data-max="5" data-step="1" data-size="xs" />
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/plugins/star-rating/star-rating.min.js')}}"></script>
<script src="{{ asset('js/clinicas/valoracion.js')}}"></script>
@endsection