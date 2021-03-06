@extends('admin.template.main')
@section('title','Noticia')
@section('header','Crear Noticia')
@section('content')


@include('admin.template.errores')
{!! Form::open(['route'=>'noticias.store','method'=>'POST', 'files'=>true]) !!}

		
		<div class="form-group" style="width: 100%;">
			{!! Form::label('titulo','Titulo') !!}
			{!! Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Escriba el titulo de su publicación','required']) !!}
		</div>
		
		<div class="form-group" >
			{!! Form::label('descripcion','Descripcion') !!}
			{!! Form::textarea('descripcion',null,['class'=>'form-control', 'rows'=>'3']) !!}
			<!--<textarea name="descripcion" id="descripcion" rows="3" cols="50" class="form-control"></textarea>-->
		</div>

		<div class="form-group" style="width: 100%">
			{!! Form::label('contenido','Contenido de la Noticia') !!}
			{!! Form::textarea('contenido',null,['class'=>'form-control', 'required']) !!}
		</div>
	
		<div class="form-group" style="width: 80%">
			{!! Form::label('estado','Estado de la Noticia') !!}
			{!! Form::select('estado',[''=>'Seleccione Estado','publicado'=>'Publicar','oculto'=>'Borrador'],null,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('imagen', 'Imagen de Portada') !!}
			{!! Form::file('imagen') !!}
			
		</div>

		<div class="col-md-9" style="padding-left: 100px">
			<div class="form-group">
				<hr>
				{!! Form::submit('Guardar Noticia',['class'=>'btn btn-success btn-block']) !!}
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