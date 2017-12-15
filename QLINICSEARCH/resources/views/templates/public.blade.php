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
        <link href="{{ asset('css/estilo-publico.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/estilo-general.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/footer.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="{{ asset('css/plugins/alertify/alertify.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/plugins/alertify/alertify.bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/personalizaciones/ui-autocomplete.css')}}" rel="stylesheet" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png')}}" />
        @yield('styles')
    </head>
    <body class="body-content {{ @$pagina_welcome ? 'FondoPublico' : '' }}">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                        @auth
                        <li><a href="{{ url('/home') }}">Administración</a></li>
                        @else
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                        @endauth
                        @endif
                    </ul>
                    @if (!@$pagina_welcome)
                    <div class="navbar-form navbar-right">
                        <input type="search" class="form-control search-header" placeholder="Buscar clínica" id="BuscarClinica">
                    </div>
                    @endif
                </div>
            </div>
        </nav>
        <div class="container" id="ContenedorPrincipal">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                    @if (!@$pagina_welcome)
                    <div class="text-center"><a href="{{ route('welcome') }}"><img src="{{ asset('img/logo-home.png')}}" width="50%" /></a></div>
                    <div class="social">
                        <ul>
                            <li><a href="http://www.facebook.com/qlinicsearch" target="_blank" class="fa fa-facebook fa-3x"></a></li>
                            <li><a href="http://www.twitter.com/qlinicsearch" target="_blank" class="fa fa-twitter fa-3x"></a></li>
                            <li><a href="mailto:qlinicsearch@gmail.com" class="fa fa-envelope fa-3x"></a></li>
                        </ul>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
        <footer id="myFooter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <img src="{{ asset('img/logo.png')}}" width="150" height="150" class="image img-responsive" />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        <h5>Comienza</h5>
                        <ul>
                            <li><a href="{{ route('categorias') }}">Directorio</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        <h5>Nosotros</h5>
                        <ul>
                            <li><a href="{{ route('conocenos') }}">Conocenos</a></li>
                            <li><a href="{{ route('conocenos') }}#mision">Misión</a></li>
                            <li><a href="{{ route('conocenos') }}#vision">Visión</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                        <h5>Ayuda</h5>
                        <ul>
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="mailto:qlinicsearch@gmail">Contactanos</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="social-networks">
                            <a href="http://www.twitter.com/qlinicsearch" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="http://www.facebook.com/qlinicsearch" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="mailto:qlinicsearch@gmail" class="google" target="_blank"><i class="fa fa-envelope"></i></a>
                        </div>
                        <a href="mailto:qlinicsearch@gmail" class="btn btn-default">Contactanos</a>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
            <p>© Copyright QlinicSearch 2017. Todos los derechos reservados. Diseño y desarrollo por ITC4D</p>
            </div>
        </footer>
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
        <script src="{{ asset('js/plugins/jquery-ui/jquery-ui-1.10.4.min.js')}}"></script>
        <script src="{{ asset('js/publico/busqueda-general.js')}}"></script>
        <script src="{{ asset('js/publico/contactanos.js')}}"></script>
        <script type="text/javascript">
            var URL_BASE = "{{ url('/') }}";
            $(document).ready(function () {
                $("input:text:visible:first").focus();
                @if (session('mensaje_error'))alertify.error("{{ session('mensaje_error') }}");@endif
                @if (session('mensaje_exito'))alertify.success("{{ session('mensaje_exito') }}");@endif
                Contactanos();
            });
        </script>
        @yield('scripts')
    </body>
</html>
