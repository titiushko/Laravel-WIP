@extends('admin.template.main')
@section('title','FAQ')
@section('header','Editar FAQ')
@section('content')

	<!-- Formulario de Editar FAQ -->
	@include('admin.template.errores')
	{!! Form::open(['route'=>['faqs.update',$faq],'method'=>'PUT']) !!}
	
	<div class="col-md-10" style="padding-left: 100px">
		<div class="form-group">
			{!! Form::label('pregunta','Pregunta') !!}
			{!! Form::text('pregunta',$faq->pregunta,['class'=>'form-control','placeholder'=>'Donde estan Ubicados?','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('respuesta','Respuesta') !!}
			{!! Form::textarea('respuesta',$faq->respuesta,['class'=>'form-control','placeholder'=>'En San Salvador ','required']) !!}
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