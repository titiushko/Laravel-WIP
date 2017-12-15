<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center"><img src="{{ asset('img/logo.png')}}" class="user-image img-responsive"/></li>
            <li><a href="{{ route('home') }}"><i class="fa fa-home fa-3x"></i> Inicio</a></li>
            @if (Auth::user()->role == Constantes::ADMINISTRADOR)
            <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-users fa-3x"></i> Usuarios</a></li>
            <li><a href="{{ route('clinics.index') }}"><i class="fa fa-ambulance fa-3x"></i> Clinicas</a></li>
            <li>
                <a href="#"><i class="fa fa-table fa-3x"></i> Catalogos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('types.index') }}">Tipos de Clinica</a></li>
                    <li><a href="{{ route('cities.index') }}">Ciudades</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</nav>