
<nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
  <div class="container">
    <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="{{ route('front.index') }}">Inicio
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="{{ route('front.cursos') }}">Cursos</a>
        </li>
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="{{ route('front.info') }}">Quienes Somos</a>
        </li>
        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="{{ route('front.contacto') }}">Contacto/FAQ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>