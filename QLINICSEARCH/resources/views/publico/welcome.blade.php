@extends('templates.public')
@section('title', 'Clínicas')
@section('content')
<div class="row">
	<div id="BuscadorGeneral" class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
		<img src="{{ asset('img/logo-home.png')}}" class="image img-responsive"/>
		<p class="text-center leyenda">
			En QlinicSearch encontrarás el más completo directorio de clínicas en el <b style="color: #00aeef;">área metropolitana</b> de San Salvador.
		</p>
		<input type="search" class="form-control" placeholder="Buscar clínica" id="BuscarClinica">
	</div>
</div>
@endsection