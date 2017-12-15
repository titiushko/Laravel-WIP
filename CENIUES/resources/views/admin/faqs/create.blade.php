@extends('admin.template.main')
@section('title','FAQ')
@section('header','Crear FAQ')
@section('content')

	<!-- Formulario de Nuevo Usuario -->
	@include('admin.template.errores')
	{!! Form::open(['route'=>'faqs.store','method'=>'POST']) !!}
	
	<div class="col-md-10" style="padding-left: 100px">
		<div class="form-group">
			{!! Form::label('pregunta','Pregunta') !!}
			{!! Form::text('pregunta',null,['class'=>'form-control','placeholder'=>'Donde estan Ubicados?','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('respuesta','Respuesta') !!}
			{!! Form::textarea('respuesta',null,['class'=>'form-control','placeholder'=>'En San Salvador ','required']) !!}
		</div>		
		
		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Registrar',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
@endsection
@section('js')
<script>
   $('#respuesta').trumbowyg();


</script>
@endsection