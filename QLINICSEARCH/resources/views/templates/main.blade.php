<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="robots" content="no-cache" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="Content-type" content="text/html; charset=utf-8" />
        <meta name="expires" content="0" />
        <meta name="pragma" content="no-cache" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title', 'default') | QLINICSEARCH</title>
        <link href="{{ asset('css/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/plugins/font-awesome/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/plugins/custom.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/estilo-general.css')}}" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="{{ asset('css/plugins/alertify/alertify.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/plugins/alertify/alertify.bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/plugins/select/select.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/plugins/datetimepicker/datetimepicker.min.css')}}" rel="stylesheet" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png')}}" />
        @yield('styles')
    </head>
    <body class="body-content">
        <div id="wrapper">
            @include('templates.partials.nav')
            @include('templates.partials.sidebar')
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div class="container text-center" style="color: #ffffff;">
                    <p>© Copyright QlinicSearch 2017. Todos los derechos reservados. Diseño y desarrollo por ITC4D</p>
                </div>
            </footer>
        </div>
        <script src="{{ asset('js/plugins/jquery/jquery-1.10.2.min.js')}}"></script>
        <script src="{{ asset('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/plugins/jquery/jquery.metisMenu.js')}}"></script>
        <script src="{{ asset('js/plugins/custom.js')}}"></script>
        <script src="{{ asset('js/utilidades/constantes.js')}}"></script>
        <script src="{{ asset('js/utilidades/utilidades.js')}}"></script>
        <script src="{{ asset('js/utilidades/errores.js')}}"></script>
        <script src="{{ asset('js/utilidades/cargando-pagina.js')}}"></script>
        <script src="{{ asset('js/utilidades/volver-arriba.js')}}"></script>
        <script src="{{ asset('js/plugins/alertify/alertify.min.js')}}"></script>
        <script src="{{ asset('js/personalizaciones/alertify.js')}}"></script>
        <script src="{{ asset('js/plugins/select/select.min.js')}}"></script>
        <script src="{{ asset('js/plugins/datetimepicker/datetimepicker.min.js')}}"></script>
        <script src="{{ asset('js/plugins/datetimepicker/locales/bootstrap-datetimepicker.es.js')}}"></script>
        <script src="{{ asset('js/personalizaciones/datetimepicker.js')}}"></script>
        <script src="{{ asset('js/usuario/sesion.js')}}"></script>
        <script type="text/javascript">
            var URL_BASE = "{{ url('/') }}";
            $(document).ready(function () {
                $("input:text:visible:first").focus();
                CambiarPassword();
                CerrarSesion();
                @if (session('mensaje_error'))alertify.error("{{ session('mensaje_error') }}");@endif
                @if (session('mensaje_exito'))alertify.success("{{ session('mensaje_exito') }}");@endif
                @if(count($errors) > 0)
                    var errores = new Array();
                    @foreach($errors->all() as $error)
                        errores.push("{{ $error }}");
                    @endforeach
                    MostrarMensajeError(errores);
                @endif
            });
        </script>
        @yield('scripts')
    </body>
</html>