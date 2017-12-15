<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Acceso Restringido</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container">
  <div class="row" style="padding-top: 100px">
  	<div class="col-md-5 col-md-offset-3" style="padding-left: 40px">
  		<div class="panel panel-warning">
			  <div class="panel-heading">
			    <h3 class="panel-title"><strong>Acceso Restringido</strong></h3>
			  </div>
			  <div class="panel-body">
			    <img class="img-responsive center-block" src="{{ asset('img/errores/acceso_restringido.png') }}">
			    <hr>
			    <strong class="text-center">
			    	<p>Usted no tiene acceso a esta zona</p>
			    	<p>
			    		<a href="">Desea volver?</a>
			    	</p>
			    </strong>
			  </div>
			</div>
  	</div>
	</div>
</div>

  <!-- jQuery -->
 <script src="{{ asset('plugins/jquery/jquery-3.2.1.js') }}"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>
</body>

</html>
