@extends('admin.template.main')
@section('title','Listado de Noticias')
@section('header','Listado de Noticias')
@section('content')

<hr>

<table class="table table-striped" cellspacing="0" width="100%" id="noticias">
	<thead>
		
		<th>Titulo</th>
		
		<th>Usuario</th>
		<th>Estado</th>
		<th>Accion</th>
	</thead>
	<tbody>
		@foreach ($noticias as $noticia)
			<tr>
				<td>{{ $noticia->titulo }}</td>
				
				<td>{{ $noticia->user->name}} {{ $noticia->user->apellido }}</td>
				<td>
					@if ($noticia->estado == 'publicado')
						<a href="{{ route('noticias.ocultar',$noticia->id) }}" onclick="return confirm('Seguro que deseas ocultar el Articulo?')" style="text-decoration: none;color:white">
							<span class="label label-success">{{ $noticia->estado }}</span>
						</a>
					@else
						<a href="{{ route('noticias.publicar',$noticia->id) }}" onclick="return confirm('Seguro que deseas Publicar el Articulo?')" style="text-decoration: none;color:white">
							<span class="label label-default">&nbsp;&nbsp;&nbsp;{{ $noticia->estado }}&nbsp;&nbsp;&nbsp;</span>
						</a>
					@endif	
				</td>
				<td>
						<a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-warning">
							<span class="glyphicon glyphicon-wrench"></span> 	
						</a>
						<a href="{{ route('noticias.destroy', $noticia->id) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que desea eliminar esta noticia?')">
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
        $('#noticias').dataTable( {
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

