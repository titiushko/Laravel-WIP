@extends('admin.template.main')
@section('title','FAQs')
@section('header','Lista de FAQs')
@section('content')

	<hr>

	<table class="table table-striped" cellspacing="0" width="100%" id="faqs">
		<thead>
			<tr>
				<th>Pregunta</th>
				<th>Respuesta</th>
				<th>Creada </th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($faqs as $faq)
				<tr>
					<td style="width: 30%">{{ $faq->pregunta }}</td>
					<td style="width: 40%;height: 120px; ">{!!$faq->respuesta !!}</td>
					<td>{{ $faq->created_at->format('d/m/Y') }}</td>
					<td>
							<a href="{{ route('faqs.edit',$faq->id) }}" class="btn btn-warning">
								<span class="glyphicon glyphicon-wrench"></span> 	
							</a>
							<a href="{{ route('faqs.destroy',$faq->id) }}" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar la pregunta?')">
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
        $('#faqs').dataTable( {
        	"iDisplayLength": 3,
        	"bSort": false,
        	"scroller": true,
        	//"scrollY": 100%,
    		"deferRender": true,
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