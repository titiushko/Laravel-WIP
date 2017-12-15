@extends('templates.public')
@section('title', 'Error 404')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="page-header">
            <span class="fa-stack fa-lg">
                <i class="fa fa-file-o fa-stack-2x"></i>
                <i class="fa fa-times fa-stack-1x"></i>
            </span>
            Error 404
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Contenido No Encontrado</h3>
            </div>
            <div class="panel-body">
                <p>Lo sentimos, se ha producido un error, ¡no se encontró la página a la que intenta acceder!</p>
                <p>
                    <strong>Las causas más probables:</strong>
                    <ul>
                        <li>El recurso que está buscando se ha eliminado, se ha cambiado su nombre o no está disponible temporalmente.</li>
                        <li>El directorio o archivo especificado no existe.</li>
                        <li>La URL no existe o contiene errores.</li>
                    </ul>
                    <br />
                    <strong>Lo que puede intentar:</strong>
                    <ul>
                        <li>Verifique que la URL esté bien escrita en la barra de direcciones del navegador web.</li>
                        <li>Si el problema persiste, notifíquelo al administrador de QLINICSEARCH enviando un correo electrónico a <a href="mailto:qlinicsearch@gmail.com" target="_blank">qlinicsearch@gmail.com</a>.</li>
                    </ul>
                    <br />
                    <button class="btn btn-sm btn-primary" type="button" id="Retroceder">
                        <i class="fa fa-reply"></i> Retroceder
                    </button>
                    <a class="btn btn-sm btn-primary" href="{{ route('welcome') }}">
                        <i class="fa fa-home"></i> Regresar a Inicio
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#Retroceder").click(function () {
            if (window.history.length > 2) window.history.back();
            else window.location.href = BASE_URL;
        });
    });
</script>
@endsection