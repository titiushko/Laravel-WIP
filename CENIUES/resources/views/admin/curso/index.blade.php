@extends('admin.template.main')
@section('title','Cursos')
@section('header','Lista de Cursos')
@section('content')
<hr>
	<table class="table table-striped" cellspacing="0" width="100%" id="curso">
		<thead>
			<tr>
				<th>Curso</th>
				<th>Descripcion</th>
				<th>Creado </th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cursos as $curso)
				<tr>
					<td>{{ $curso->nombre_curso }}</td>
					<td>{{ $curso->desc_curso }}</td>
					<td>{{ $curso->created_at->format('d/m/Y') }}</td>
					<td>
							<a href="{{ route('cursos.edit',$curso->id) }}" class="btn btn-warning">
								<span class="glyphicon glyphicon-wrench"></span> 	
							</a>
							<a href="{{ route('cursos.destroy',$curso->id) }}" class="btn btn-danger" onclick="return confirm('Seguro que deseas eliminar el Curso?')">
								<span class="glyphicon glyphicon-remove-sign"></span>
							</a>
					</td>
				</tr>	
			@endforeach
		</tbody>
	</table>
@endsection
@section('js')
<script >
	$(document).ready(function() {
        $('#curso').dataTable( {
        	"iDisplayLength": 3,

        	"bSort": false,
            "language": {

            	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
                
   
            }
        } );
    } );
</script>
@endsection