@extends('admin.template.main')
@section('title','Usuarios')
@section('header','Usuarios Deshabilitados')
@section('content')

	<hr>

<table class="table table-striped" cellspacing="0" width="100%" id="inactivo">
		<thead>
			<tr>
				
				<th>Nombre Completo</th>
				
				<th>Correo Electronico</th>
				<th>Telefonos</th>
				<th>Tipo</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->name }} {{ $user->apellido }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<p class="text-info">{{ $user->tel_fijo }}</p>
						<p class="text-info">{{ $user->tel_movil }}</p>
					</td>
					<td>
						@if ($user->type == 'admin')
								<span class="label label-danger">{{ $user->type }}</span>
						@else
								<span class="label label-primary">{{ $user->type }}</span>
						@endif	
					</td>
					<td>
						<a href="{{ route('users.habilitar',$user->id) }}" class="btn btn-default" onclick="return confirm('Seguro que deseas Activar al Usuario?')">
							<span class="fa fa-unlock"></span>&nbsp;&nbsp;Activar&nbsp;&nbsp;
						</a>
					</td><!--glyphicon glyphicon-ok-circle-->
				</tr>	
			@endforeach
		</tbody>
	</table>
@endsection
@section('js')
<script >
	$(document).ready(function() {
        $('#inactivo').dataTable( {
        	"iDisplayLength": 5,

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