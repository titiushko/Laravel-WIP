@extends('admin.template.main')
@section('header','Cambiar Password')
@section('content')
@include('admin.template.errores')
	{{--  --}}
	<hr />
	{!! Form::open(['route'=>'profile.password','method'=>'POST']) !!}
	
	<div class="col-md-10" style="padding-left: 200px">
		<div class="form-group">
			{!! Form::label('mypassword','Introduzca su Password actual') !!}
			{!! Form::password('mypassword',['class'=>'form-control','placeholder'=>'***********','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Nuevo Password') !!}
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'***********','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password','Confirmacion de password') !!}
			{!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'**********','required']) !!}
		</div>		
		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Cambiar Password',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
{{--  
@if (Session::has('message'))
 <div class="text-danger">
 {{Session::get('message')}}
 </div>
@endif
<hr />
<form method="post" action="{{ url('docente/updatepassword') }}">
 {{csrf_field()}}
 <div class="form-group">
  <label for="mypassword">Introduce tu carpeta password actual password:</label>
  <input type="password" name="mypassword" class="form-control">
  <div class="text-danger">{{$errors->first('mypassword')}}</div>
 </div>
 <div class="form-group">
  <label for="password">Introduce tu nuevo password:</label>
  <input type="password" name="password" class="form-control">
  <div class="text-danger">{{$errors->first('password')}}</div>
 </div>
 <div class="form-group">
  <label for="mypassword">Confirma tu nuevo password:</label>
  <input type="password" name="password_confirmation" class="form-control">
 </div>
 <button type="submit" class="btn btn-primary">Cambiar mi password</button>
</form>
--}}
@endsection