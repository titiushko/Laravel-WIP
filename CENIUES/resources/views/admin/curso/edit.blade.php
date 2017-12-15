@extends('admin.template.main')
@section('title','Curso')
@section('header','Editar Curso')
@section('content')

	<!-- Formulario de Editar FAQ -->
	@include('admin.template.errores')
	{!! Form::open(['route'=>['cursos.update',$curso],'method'=>'PUT']) !!}
	
	<div class="col-md-10" style="padding-left: 100px">
		<div class="form-group">
			{!! Form::label('nombre_curso','Nombre del Curso') !!}
			{!! Form::text('nombre_curso',$curso->nombre_curso,['class'=>'form-control','placeholder'=>'Ingles, Frances, etc','required']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('descripcion','Descripcion del Curso') !!}
			{!! Form::textarea('descripcion',$curso->desc_curso,['class'=>'form-control']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('modulo','Modulos del Curso') !!}
			{!! Form:: number('valor', $modulo)!!}

		</div>	
		
		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Actualizar Curso',['class'=>'btn btn-success btn-block']) !!}
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