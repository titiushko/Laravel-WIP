@extends('admin.template.main')
@section('title','Usuarios')
@section('header','Imagenes para Slide')
@section('content')
	<div class="row">
		@foreach ($images as $image)
			<div class="col-md-4">	
				<div class="panel panel-primary">
					<div class="panel-body">
						<p style="text-align: center;"><strong>{{ $image->name }}</strong></p>
						<img src="{{ $image->url.$image->name.'.'.$image->ext }}" class="img-responsive">
					</div>
					<div class="panel-footer">
						@if ($image->estado == 'agregado')
							<a href="{{ route('img_slide.quitar',$image->id) }}" onclick="return confirm('¿Seguro que desea quitar la imagen del Slide?')" style="text-decoration: none;color:white">
								<span class="label label-success">{{ $image->estado }}</span>
							</a>
						@else
							<a href="{{ route('img_slide.agregar',$image->id) }}" onclick="return confirm('¿Seguro que desea agregar la Imagen al Slide?')" style="text-decoration: none;color:white">
								<span class="label label-default">&nbsp;&nbsp;&nbsp;{{ $image->estado }}&nbsp;&nbsp;&nbsp;</span>
							</a>
						@endif
						<a href="{{ route('img_slide.destroy',$image->id) }}" onclick="return confirm('¿Seguro que deseas Borrar la imagen?')" style="text-decoration: none;color:white;padding-left: 75px">
								<span class="label label-danger">&nbsp;&nbsp;&nbsp;eliminar&nbsp;&nbsp;&nbsp;</span>
						</a>	
					</div>
				</div>	
			</div>
		@endforeach
	</div>
@endsection

