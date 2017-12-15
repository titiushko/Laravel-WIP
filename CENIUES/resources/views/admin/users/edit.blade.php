@extends('admin.template.main')
@section('header','Editar Usuario')
@section('content')

@include('admin.template.errores')
	<!-- Formulario de Edicion de Usuario -->
	{!! Form::open(['route'=>['users.update',$user],'method'=>'PUT']) !!}
	
	<div class="col-md-10" style="padding-left: 200px">
		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('apellido','Apellido') !!}
			{!! Form::text('apellido',$user->apellido,['class'=>'form-control','placeholder'=>'Apellido Completo','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email','Correo Electronico') !!}
			{!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Ejemplo:mail@mail.com','required']) !!}
		</div>		
		 
		 {{-- 
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'**********']) !!}
		</div>
		 --}}
		{{-- Telefonos--}}
		<div class="form-group">
			{!! Form::label('label','Telefonos') !!}
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('tel_fijo','Fijo') !!}
				{!! Form::text('tel_fijo',$user->tel_fijo,['class'=>'form-control','placeholder'=>'0000-0000','required']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('tel_movil','Movil') !!}
				{!! Form::text('tel_movil',$user->tel_movil,['class'=>'form-control','placeholder'=>'0000-0000','required']) !!}
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
				{!! Form::submit('Editar',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}

@endsection