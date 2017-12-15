@extends('admin.template.main')
@section('title','Cursos')
@section('header','Crear Curso')
@section('content')

@include('admin.template.errores')
	{!! Form::open(['route'=>'cursos.store','method'=>'POST']) !!}
	
	<div class="col-md-10" style="padding-left: 100px">
		<div class="form-group">
			{!! Form::label('nombre_curso','Nombre del Curso') !!}
			{!! Form::text('nombre_curso',null,['class'=>'form-control','placeholder'=>'Ingles, Frances, etc','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion','Descripcion del Curso') !!}
			{!! Form::textarea('descripcion',null,['class'=>'form-control']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('modulo','Modulos del Curso') !!}
			{!! Form:: number('valor', null)!!}

		</div>	
		
		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Registrar Curso',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
	
	{!! Form::close() !!}
@endsection

@section('js')
<script>
   $('#descripcion').trumbowyg();


</script>
@endsection