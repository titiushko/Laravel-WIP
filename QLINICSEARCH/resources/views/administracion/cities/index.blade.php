@extends('templates.main')
@section('title', 'Listado de Ciudades')
@section('styles')
<link href="{{ asset('css/plugins/dataTables/dataTables.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/plugins/dataTables/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/personalizaciones/datatable.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><i class="fa fa-building-o"></i> Listado de Ciudades</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><i class="fa fa-building-o"></i> Ciudades</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="dropdown pull-right">
            <a href="{{ route('cities.create') }}" class="btn btn-success">
                <i class="fa fa-plus-square"></i> Nuevo
            </a>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
        <table class="table table-striped table-bordered table-hover table-responsive dataTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td>
                            <span class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('cities.edit', $city->id) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-sm AjaxAction" title="Eliminar" data-url="{{ route('cities.destroy', $city->id) }}" data-type="DELETE"><i class="fa fa-trash"></i></a>
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
@endsection