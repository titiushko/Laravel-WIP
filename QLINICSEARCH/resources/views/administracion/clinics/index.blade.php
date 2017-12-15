@extends('templates.main')
@section('title', 'Listado de Clinicas')
@section('styles')
<link href="{{ asset('css/plugins/dataTables/dataTables.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/plugins/dataTables/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/personalizaciones/datatable.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><i class="fa fa-ambulance"></i> Listado de Clinicas</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><i class="fa fa-ambulance"></i> Clínicas</li>
        </ol>
    </div>
</div>
@if (Auth::user()->role == Constantes::USUARIO)
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="dropdown pull-right">
            <a href="{{ route('clinics.create') }}" class="btn btn-success">
                <i class="fa fa-plus-square"></i> Nuevo
            </a>
        </div>
    </div>
</div>
@endif
<hr>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
        <table class="table table-striped table-bordered table-hover table-responsive dataTable" id="clinics">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clinics as $clinic)
                    <tr>
                        <td>{{ $clinic->name }}</td>
                        <td>{{ $clinic->type->type }}</td>
                        <td>
                            @if ($clinic->state == Constantes::APROBADO)<span class="label label-success">{{ Constantes::APROBADO }}</span>
                            @else<span class="label label-danger">{{ Constantes::PENDIENTE }}</span>@endif
                        </td>
                        <td>
                            <span class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('clinics.edit', $clinic->id) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-sm AjaxAction" title="Eliminar" data-url="{{ route('clinics.destroy', $clinic->id) }}" data-type="DELETE"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-info btn-sm {{ $clinic->state == Constantes::APROBADO ? '' : 'disabled' }}" title="Ver" href="{{ route('clinics.show', $clinic->id) }}"><i class="fa fa-eye"></i></a>
                                @if (Auth::user()->role == Constantes::ADMINISTRADOR)
                                    @if ($clinic->state == Constantes::APROBADO)
                                    <a class="btn btn-danger btn-sm CambiarEstado" title="Rechazar" data-id="{{ $clinic->id }}" data-state="{{ Constantes::PENDIENTE }}"><i class="fa fa-window-close"></i></a>
                                    @else
                                    <a class="btn btn-success btn-sm CambiarEstado" title="Aprobar" data-id="{{ $clinic->id }}" data-state="{{ Constantes::APROBADO }}"><i class="fa fa-check-square"></i></a>
                                    @endif
                                @endif
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/plugins/dataTables/dataTables.min.js')}}"></script>
<script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/personalizaciones/datatable.js')}}"></script>
<script src="{{ asset('js/ajax-action.js')}}"></script>
<script src="{{ asset('js/clinicas/cambiar-estado.js')}}"></script>
@endsection