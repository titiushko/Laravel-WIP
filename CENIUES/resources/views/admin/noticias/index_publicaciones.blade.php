@extends('admin.template.main')
@section('title','Listado de Publicaciones')
@section('header','Listado de Publicaciones')
@section('content')


<table class="table table-striped" cellspacing="0" width="100%" id="publicacion">
		<thead>
			<tr>
				
				<th>Titulo</th>
				<th>Curso</th>
			 	<th>Modulo</th>
				<th>Usuario</th>
				<th>Estado</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($articulos as $articulo)
				<tr>
					
					<td>{{ $articulo->titulo }}</td>
					<td>{{ $articulo->nombre_curso }}</td>
					<td>{{ $articulo->nombre_modulo }}</td>
					<td>{{ $articulo->name }}  {{ $articulo->apellido }}</td>
					 
					<td>
						@if ($articulo->estado == 'publicado')
							<a href="{{ route('publicaciones.oculto',$articulo->id) }}" onclick="return confirm('¿Seguro que deseas ocultar la Publicacion?')" style="text-decoration: none;color:white">
								<span class="label label-success">{{ $articulo->estado }}</span>
							</a>
						@else
							<a href="{{ route('publicaciones.publicado',$articulo->id) }}" onclick="return confirm('¿Seguro que deseas Publicar?')" style="text-decoration: none;color:white">
								<span class="label label-default">&nbsp;&nbsp;&nbsp;{{ $articulo->estado }}&nbsp;&nbsp;&nbsp;</span>
							</a>
						@endif	
					</td>
					
					<td>
							<a href="{{ route('publicaciones.destroy',$articulo->id) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar la Publicación?')">
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
        $('#publicacion').dataTable( {
        	"pagingType": "full_numbers",
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
