@extends('admin.template.main')
@section('header','Cambiar Password')
@section('content')
@include('admin.template.errores')
{{-- 
	@if (Session::has('message'))
		 <div class="text-danger">
		 {{Session::get('message')}}
		 </div>
	@endif
	
	--}}
	<hr />
	{!! Form::open(['route'=>'user.password','method'=>'POST']) !!}
	
	<div class="col-md-10" style="padding-left: 200px">
		<div class="form-group">
			<input type="hidden" name="id" value="{{ $user->id }}">
		</div>
		<div class="form-group">
			<label for="Usuario"><h4>Usuario: {!! $user->name." ".$user->apellido  !!}</h4></label>
		</div>
		<div class="form-group">
			{!! Form::label('password','Nuevo Password') !!}
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'***********','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Confirmacion de password') !!}
			{!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'**********','required']) !!}
		</div>		
		 
		 {{--
		<div class="form-group">
			{!! Form::label('password','Contraseña') !!}
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'**********']) !!}
		</div>
		--}}

		{{-- Telefonos--}}

		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Cambiar Password',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
	{{-- 
	<form method="post" action="{{ url('docente/updatepassword') }}">
		 {{csrf_field()}}
		 {{--  
		 <div class="form-group">
		  <label for="mypassword">Introduce tu carpeta password actual password:</label>
		  <input type="password" name="mypassword" class="form-control">
		  <div class="text-danger">{{$errors->first('mypassword')}}</div>
		 </div>
		 --}}
		 {{-- 
		 <div class="form-group">
		  <label for="password">Introduce el nuevo password:</label>
		  <input type="password" name="password" class="form-control">
		  <div class="text-danger">{{$errors->first('password')}}</div>
		 </div>
		 <div class="form-group">
		  <label for="mypassword">Confirma el nuevo password:</label>
		  <input type="password" name="password_confirmation" class="form-control">
		 </div>
		 <button type="submit" class="btn btn-success">Cambiar password</button>
	</form>
	 --}}
@endsection