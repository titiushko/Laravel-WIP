@extends('admin.template.main')
@section('title','Usuarios')
@section('header','Agregar Imagen')
@section('content')

	@include('admin.template.errores')
	<!-- Formulario de Nuevo Usuario -->
	{!! Form::open(['route'=>'slide.store','method'=>'POST','files'=>true]) !!}
	
	<div class="col-md-10" style="padding-left: 200px">
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre con el que guardara el archivo','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('imagen', 'Imagen a Agregar') !!}
			{!! Form::file('imagen') !!}
		</div>		
		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Guardar Imagen',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}

@endsection