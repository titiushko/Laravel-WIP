@extends('admin.template.main')
@section('title','Listado de Articulos')
@section('header','Listado de Articulos')
@section('content')

	<hr>
<table class="table table-striped" cellspacing="0" width="100%" id="publicacion">
		<thead>
			<tr>
				
				<th>Titulo</th>
				<th>Curso</th>
			 	<th>Modulo</th>
				<th>Creado el</th>
				<th>Estado</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($articles as $article)
				<tr>
				
					<td>{{ $article->titulo }}</td>
					<td>{{ $article->nombre_curso }}</td>
					<td>{{ $article->nombre_modulo }}</td>
					<td>{{ $article->created_at }}</td>
					<td>
						@if ($article->estado == 'publicado')
							<a href="{{ route('articles.ocultar',$article->id) }}" onclick="return confirm('Seguro que deseas ocultar el Articulo?')" style="text-decoration: none;color:white">
								<span class="label label-success">{{ $article->estado }}</span>
							</a>
						@else
							<a href="{{ route('articles.publicar',$article->id) }}" onclick="return confirm('Seguro que deseas Publicar el Articulo?')" style="text-decoration: none;color:white">
								<span class="label label-default">&nbsp;&nbsp;&nbsp;{{ $article->estado }}&nbsp;&nbsp;&nbsp;</span>
							</a>
						@endif	
					</td>
					<td>
							<a href="{{ route('articles.edit',$article->id) }}" class="btn btn-warning">
								<span class="glyphicon glyphicon-wrench"></span> 	
							</a>
							<a href="{{ route('articles.destroy',$article->id) }}" class="btn btn-danger" onclick="return confirm('Seguro que deseas eliminar el Articulo?')">
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