@extends("layouts.main")
@section("contenido")
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h2>Lista de Categorías</h2>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="dropdown pull-right">
            <a href="categoria/create" class="btn btn-success">
                <i class="fa fa-plus-square"></i> Agregar
            </a>
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include("almacen.categoria.buscar")
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
        <table class="table table-striped table-bordered table-hover table-responsive">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->categoriaid }}</td>
                    <td>{{ $categoria->nombrecategoria }}</td>
                    <td>{{ $categoria->descripcioncategoria }}</td>
                    <td>
                        <a href="{{ URL::action('CategoriaController@editar', $categoria->idcategoria) }}" class="btn btn-info">
                            <i class="fa fa-pencil"></i> Editar
                        </a>
                        <a data-target="#modal-eliminar-categoria-{{ $categoria->categoriaid }}" data-toggle="modal" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i> Eliminar
                        </a>
                    </td>
                </tr>
                @include("almacen.categoria.modal")
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $categorias->render() }}
</div>
@endsection
