@extends('templates.main')
@section('title', 'Creación de Clínica')
@section('styles')
<link href="{{ asset('css/personalizaciones/tinymce.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><i class="fa fa-file-text-o"></i> Creación de Clínica</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="{{ route('clinics.index') }}"><i class="fa fa-ambulance"></i> Clínicas</a></li>
            <li><i class="fa fa-file-text-o"></i> Datos</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Complete los datos requeridos</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route'=>['clinics.update', $clinic], 'method'=>'PUT', 'autocomplete'=>'off']) !!}
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('Nombre') !!}
                                    {!! Form::text('name', $clinic->name, array('required', 'class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('Tipos de Clínica') !!}
                                    {!! Form::select('type_id', $types, $clinic->type_id, array('required', 'class'=>'form-control selectpicker', 'data-live-search'=>'true', 'data-size'=>'10', 'placeholder'=>'Seleccione un tipo de clínica')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('Teléfono') !!}
                                    {!! Form::text('telephone', $clinic->telephone, array('required', 'class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('Ciudad') !!}
                                    {!! Form::select('city_id', $cites, $clinic->city_id, array('required', 'class'=>'form-control selectpicker', 'data-live-search'=>'true', 'data-size'=>'10', 'placeholder'=>'Seleccione una ciudad')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('Sitio Web') !!}
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                        {!! Form::text('website', $clinic->website, array('required', 'class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    {!! Form::label('Facebook') !!}
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        {!! Form::text('facebook', $clinic->facebook, array('required', 'class'=>'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('Servicios') !!}
                                    {!! Form::textarea('services', $clinic->services, array('required', 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('Descripción') !!}
                                    {!! Form::textarea('description', $clinic->description, array('required', 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('Dirección') !!}
                                    {!! Form::textarea('address', $clinic->address, array('required', 'class'=>'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-floppy-o"></i> Guardar
                            </button>
                            <a href="{{ route('clinics.index') }}" class="btn btn-danger">
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
@section('scripts')
<script src="{{ asset('js/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset('js/personalizaciones/tinymce.js')}}"></script>
@endsection