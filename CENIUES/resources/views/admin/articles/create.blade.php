@extends('admin.template.main')
@section('title','articles')
@section('header','Crear Publicacion')
@section('content')
@include('admin.template.errores')
{!! Form::open(['route'=>'articles.store','method'=>'POST','files'=>true]) !!}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
	  <div class="col-md-4">
	  	<div class="form-group" style="width: 80%;">
				{!! Form::label('curso','Curso') !!}
				{!! Form::select('curso_id',$cursos,null,['id'=>'curso','class'=>'form-control','placeholder'=>'Seleccione Un Curso','required']) !!}
			</div>
	  </div>
	  <div class="col-md-2"></div>	
	  <div class="col-md-4">
	  	<div class="form-group" style="width:80%;">
				{!! Form::label('modulo','Modulo') !!}
				{!! Form::select('modulos_id',['placeholder'=>'Seleccione un Modulo'],null,['id'=>'modulo','class'=>'form-control']) !!}
			</div>
	  </div>
	  <div class="col-md-1"></div>
	</div>
	
	<div class="row">
		<div class="form-group">
			{!! Form::label('titulo','Titulo') !!}
			{!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Escriba el titulo de su publicación','required']) !!}
		</div>
		
		<div class="form-group" >
			{!! Form::label('descripcion','Descripcion') !!}
			{!! Form::textarea('descripcion',null,['class'=>'form-control', 'rows'=>'3']) !!}
			<!--<textarea name="descripcion" id="descripcion" rows="3" cols="50" class="form-control"></textarea>-->
		</div>

		<div class="form-group">
			{!! Form::label('contenido','Contenido de la Noticia') !!}
			{!! Form::textarea('contenido',null,['class'=>'form-control', 'rows'=>'25']) !!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('estado','Estado de la Noticia') !!}
				{!! Form::select('estado',[''=>'Seleccione Estado','publicado'=>'Publicar','oculto'=>'Borrador'],null,['class'=>'form-control']) !!}
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('imagen', 'Imagen de Portada') !!}
				{!! Form::file('imagen') !!}
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>

		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Guardar Noticia',['class'=>'btn btn-success btn-block']) !!}
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@endsection
@section('js')
<script>
   $('#contenido').trumbowyg({
 		/*
 		btns: [
      	['base64']
  	]
  	*/
	  btns: [
      ['viewHTML'],
      ['undo', 'redo'], // Only supported in Blink browsers
      ['formatting'],
      ['strong', 'em', 'del'],
      ['superscript', 'subscript'],
      ['link'],
      ['insertImage'],
      ['base64'],
      ['insertAudio'],
      ['noembed'],
      ['upload'],
      ['foreColor', 'backColor'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
      ['unorderedList', 'orderedList'],
      ['horizontalRule'],
      ['removeformat'],
      ['fullscreen']
	  ],
	  plugins: {
        // Add imagur parameters to upload plugin for demo purposes
        upload: {
        		serverPath: 'http://localhost/CENIUES/public/audio/',
            //serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
           /* headers: {
                'Authorization': 'Client-ID xxxxxxxxxxxx'
            },*/
            urlPropertyName: 'data.link'
        }
    }
	  
 	});


</script>
@endsection
