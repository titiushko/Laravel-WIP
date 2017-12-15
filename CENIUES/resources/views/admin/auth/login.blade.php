<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login CENIUES</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  </head>
  @include('admin.template.errores')
  <body style="background-color: beige">

    <div class="container" style="padding-top:40px;padding-top: 10%"  >
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title" style="color:red"><strong>Ingreso de Sistema</strong></h3>
            </div>
            <div class="panel-body">
              {!! Form::open(['route'=>'admin.auth.login','method'=>'POST']) !!}
                <div class="form-group">
                  {!! Form::label('email','Correo Electronico',['class'=> 'text-heading']) !!}
                  {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@mail.com']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('password','Contraseña') !!}
                  {!! Form::password('password',['class'=>'form-control','placeholder'=>'*********']) !!}
                </div>
                <div class="form-group">
                  {!! Form::submit('Ingresar',['class'=>'btn btn-danger btn-block']) !!}
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>