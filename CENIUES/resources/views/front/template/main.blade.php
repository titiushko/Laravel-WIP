<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ICT4D">
    <meta name="description" content=" El Centro de Enseñanza de Idiomas de La Universidad de El Salvador CENIUES es el encargando de los cursos libres de Inglés y Francés.">
    <meta name="keywords" content="Idioma,Language,English,Ingles,Japones,Frances,Italiano,CENIUES,Centro de Enseñanza de Idiomas, Universidad de El Salvador,UES,Universidad Nacional">
    <meta name="revised" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta data-pais="El Salvador" data-materia="TPI-115" data->
      

    <title>@yield('title','Home') | CENIUES</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/eyelashes.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/business-casual.css') }}" rel="stylesheet">

    <!-- Estilo css -->
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

  </head>

  <body>

    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">
      @yield('encabezado','Home')
    </div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block text-uppercase">
      *<a href="{{ route('admin.auth.login') }}" style="text-decoration: none;color:white">
        Enlazando Culturas
      </a>*
    </div>

    <!-- Navigation -->
      @include('front.template.partials.nav')
    <!-- -->

    
    <div class="container">
      
      @yield('content')
      
    </div>
    <!-- /.container -->

    <footer class="bg-faded text-center py-5">
      <div class="container">
        <p class="m-0">Ceniues &copy;2017</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('plugins/jquery/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

      @yield('js')

  </body>
  
</html>