@extends('admin.template.main')

@section('title','Crear Usuario')

@section('header','Crear Usuario')

@section('content')


@include('admin.template.errores')
	<!-- Formulario de Nuevo Usuario -->
	{!! Form::open(['route'=>'users.store','method'=>'POST']) !!}
	
	<div class="col-md-10" style="padding-left: 200px">
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('apellido','Apellido') !!}
			{!! Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Apellido Completo','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico') !!}
			{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ejemplo:mail@mail.com','required']) !!}
		</div>		
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'**********','required']) !!}
		</div>
		
		{{-- Telefonos--}}
		<div class="form-group">
			{!! Form::label('label','Telefonos') !!}
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('tel_fijo','Fijo') !!}
				{!! Form::text('tel_fijo',null,['class'=>'form-control','placeholder'=>'00000000']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('tel_movil','Movil') !!}
				{!! Form::text('tel_movil',null,['class'=>'form-control','placeholder'=>'00000000']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('type','Tipo de Usuario') !!}
		</div>
		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
			{!! Form::select('type',[''=>'Seleccione Tipo','docente'=>'Docente','admin'=>'Administrador'],null,['class'=>'form-control']) !!}
			</div>
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