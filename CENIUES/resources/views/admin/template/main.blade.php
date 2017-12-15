<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | CENIUES</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">
  <!-- CSS de editor de texo-->
  <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
  <!-- CSS de datatable para tablas-->
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/DataTables/css/jquery.dataTables.min.css') }}">

  <!-- CSS de dropzone para imagenes -->
  <link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">

  <!-- Custom Fonts -->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

  <!-- CSS de datatable para tablas-->
  
  <!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">   C:\wamp64\www\ceniues\public\plugins\datatable\DataTables\css-->

  


</head>

<body>
<div class="container">
  <div id="wrapper">
  @if (Auth::user()) 
    {{-- Verifica si esta Autenticado --}}
    
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('admin.auth.logout') }}" ><strong>CENIUES</strong></a>
      </div>
      
      <!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{ Auth::user()->name }}&nbsp;{{ Auth::user()->apellido }}  ({{ Auth::user()->type }})
              <i class="fa fa-user fa-fw fa-2x"></i><i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <!--
            <li><a href="#"><i class="fa fa-user fa-fw"></i></a>
            </li>
            
            <li><a href=""><i class="fa fa-gear fa-fw"></i>Editar Perfil</a>
            </li>
            -->
            <li class="divider"></li>
            <li><a href="{{ route('perfil.password') }}"><i class="fa fa-key fa-fw"></i>&nbsp;Cambiar Password</a>
            </li>
            <li><a href="{{ route('admin.auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->
      <br><br>
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <!-- caja de Busqueda
            <li class="sidebar-search">
              <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <!-- /input-group 
            </li>
            -->
            @if (Auth::guest())
                    @else
                        @if (Auth::user()->type=="admin")
                            @include('admin.template.admin')
                        @endif

                        @if (Auth::user()->type=="docente")
                            @include('admin.template.docente')
                        @endif
                    @endif 

          </ul>
        </div>
          <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">@yield('header','Pagina Principal')</h1>
              @include('flash::message')
              @yield('content')
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
      <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  @endif 
</div>

  <!-- jQuery -->

 <script src="{{ asset('plugins/jquery/jquery-3.2.1.js') }}"></script>
  <script src="{{ asset('js/dropdown.js') }}"></script>


<!-- Script de editor de textp-->
<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/plugins/base64/trumbowyg.base64.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/plugins/colors/trumbowyg.colors.css') }}"></script>
<script src="{{ asset('plugins/trumbowyg/plugins/colors/trumbowyg.colors.min.js') }}"></script>
{{-- <script src="{{ asset('plugins/trumbowyg/plugins/insertaudio/trumbowyg.insertaudio.js') }}"></script>--}}
 <script src="{{ asset('plugins/trumbowyg/plugins/insertaudio/trumbowyg.insertaudio.min.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/plugins/noembed/trumbowyg.noembed.min.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/plugins/upload/trumbowyg.upload.js') }}"></script>

<!-- DATETABLEJS query para tablas -->
<script src="{{ asset('plugins/datatable/DataTables/js/jquery.dataTables.js') }}" ></script>

<!--- dropzone query de imagenes-->
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>

  <!--<script src="{{ asset('vendor/jquery/dropdown.js') }}"></script>-->

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('dist/js/sb-admin-2.js') }}"></script>

  <!-- JQuery de editor de text area-->
   @yield('js') 
  

</body>

</html>
