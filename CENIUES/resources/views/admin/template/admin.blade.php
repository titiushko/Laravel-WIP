<li>
  <a href="#"><i class="fa fa-users fa-fw fa-2x"></i>&nbsp;&nbsp;&nbsp;<strong>Usuarios</strong><span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li>
      <a href="{{ route('users.create') }}"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;&nbsp;Agregar Usuarios</a>
    </li>
    <li>
      <a href="{{ route('users.index') }}"><i class="fa fa-eye fa-1x"></i>&nbsp;&nbsp;&nbsp;Usuarios Activos</a>
    </li>
    <li>
      <a href="{{ route('users.inactivo') }}"><i class="fa fa-low-vision fa-1x"></i>&nbsp;&nbsp;&nbsp;Usuarios Inactivos</a>
    </li>
  
  </ul>
  <!-- /.nav-second-level -->
</li>
<br>
<li>
  <a href="#"><i class="fa fa-cubes fa-fw fa-2x"></i>&nbsp;&nbsp;&nbsp;<strong>Cursos</strong><span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li>
        <a href="{{ route('cursos.create') }}"><i class="fa fa-cube fa-fw"></i>&nbsp;&nbsp;&nbsp;Nuevo Curso</a>
    </li>
    <li>
        <a href="{{ route('cursos.index') }}"><i class="fa fa-bars fa-fw"></i>&nbsp;&nbsp;&nbsp;Ver Cursos</a>
    </li>
  </ul>
  <!-- /.nav-second-level -->
</li>
<br>
<li>
  <a href="#"><i class="fa fa-question fa-fw fa-2x"></i>&nbsp;&nbsp;&nbsp;<strong>FAQ's</strong><span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li>
        <a href="{{ route('faqs.create') }}"><i class="fa fa-plus fa-fw"></i>&nbsp;&nbsp;&nbsp;Nueva FAQ's</a>
    </li>
    <li>
        <a href="{{ route('faqs.index') }}"><i class="fa fa-bars fa-fw"></i>&nbsp;&nbsp;&nbsp;Ver FAQ's</a>
    </li>
  </ul>
  <!-- /.nav-second-level -->
</li>
<br>

<li class="">
  <a href="#"><i class="fa fa-files-o fa-fw fa-2x"></i>&nbsp;&nbsp;&nbsp;<strong>Noticias</strong><span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li>
        <a href="{{ route('noticias.create') }}"><i class="fa fa-file-text fa-fw"></i>&nbsp;&nbsp;&nbsp;Crear Noticia</a>
    </li>
    <li>
        <a href="{{ route('noticias.index') }}"><i class="fa fa-newspaper-o fa-fw"></i>&nbsp;&nbsp;&nbsp;Ver Noticias</a>
    </li>

  </ul>
  <!-- /.nav-second-level -->
</li>
<br>

<li class="">
  <a href="#"><i class="fa fa-files-o fa-fw fa-2x"></i>&nbsp;&nbsp;&nbsp;<strong>Publicaciones Docente</strong><span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li>
        <a href="{{ route('publicaciones.index') }}"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;&nbsp;Publicaciones Docentes Activos</a>
    </li>
<li>
        <a href="{{ route('articulos.index') }}"><i class="fa fa-folder-open-o"></i>&nbsp;&nbsp;&nbsp;Publicaciones de Docentes Inactivos</a>
    </li>

  </ul>
  <!-- /.nav-second-level -->
</li>
<br>
<li class="">
  <a href="#"><i class="fa fa-exchange fa-fw fa-2x"></i>&nbsp;&nbsp;&nbsp;<strong>Slider</strong><span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
    <li>
        <a href="{{ route('slide.create') }}"><i class="fa fa-picture-o fa-fw"></i>&nbsp;&nbsp;&nbsp;Agregar Imagen</a>
    </li>
    <li>
        <a href="{{ route('slide.index') }}"><i class="fa fa-th fa-fw"></i>&nbsp;&nbsp;&nbsp;Galeria de Imagenes</a>
    </li>
  </ul>
  <!-- /.nav-second-level -->
</li>