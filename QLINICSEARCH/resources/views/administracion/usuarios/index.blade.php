@extends('templates.main')
@section('title', 'Listado de Usuarios')
@section('styles')
<link href="{{ asset('css/plugins/dataTables/dataTables.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/plugins/dataTables/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/personalizaciones/datatable.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header"><i class="fa fa-users"></i> Listado de Usuarios</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a></li>
            <li><i class="fa fa-users"></i> Usuarios</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="dropdown pull-right">
            <a href="{{ route('usuarios.create') }}" class="btn btn-success">
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
                    <th>Correo Electrónico</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if ($user->activo)<span class="label label-success">Activo</span>
                            @else<span class="label label-danger">Inactivo</span>@endif
                        </td>
                        <td>
                            <span class="btn-group">
                                <a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit', $user->id) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                @if ($user->activo)
                                <a class="btn btn-danger btn-sm AjaxAction" title="Dar de baja"
                                   data-url="{{ route('administracion.usuarios.destroy', $user->id) }}"
                                   data-message="Está a punto de dar de <span class='label label-danger'>baja</span> al usuario <b>{{ $user->email }}</b>. ¿Está seguro de continuar?">
                                    <i class="fa fa-arrow-down"></i>
                                </a>
                                @else
                                <a class="btn btn-success btn-sm AjaxAction" title="Dar de alta"
                                   data-url="{{ route('administracion.usuarios.restore', $user->id) }}"
                                   data-message="Está a punto de dar de <span class='label label-success'>alta</span> al usuario <b>{{ $user->email }}</b>. ¿Está seguro de continuar?">
                                    <i class="fa fa-arrow-up"></i>
                                </a>
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
@endsection