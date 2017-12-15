@extends('front.template.main')

@section('title','Inicio')

@section('encabezado','CENIUES')

@section('content')

<div class="bg-faded p-4 my-4">
  <!-- Image Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      @if(isset($img[0]->id) == false)
        <div class="carousel-item active">
          <img class="d-block img-fluid w-100" src="img\slide-1.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
            <p class="text-shadow"></p>
          </div>
        </div>
      @else
        <div class="carousel-item active">
          <img class="d-block img-fluid w-100" src="{{ $img[0]->url.$img[0]->name.".".$img[0]->ext }}" alt="">
          <div class="carousel-caption d-none d-md-block">
            <p class="text-shadow"></p>
          </div>
        </div>
      @endif
        
      @if (isset($img[1]->id) == false)
        <div class="carousel-item">
          <img class="d-block img-fluid w-100" src="img\slide-1.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
            <p class="text-shadow"></p>
          </div>
        </div>
      @else
        <div class="carousel-item">
          <img class="d-block img-fluid w-100" src="{{ $img[1]->url.$img[1]->name.".".$img[1]->ext }}" alt="">
          <div class="carousel-caption d-none d-md-block">
            <p class="text-shadow"></p>
          </div>
        </div>
      @endif
      @if (isset($img[2]->id) == false)
        <div class="carousel-item" >
          <img class="d-block img-fluid w-100" src="img\slide-1.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
            <p class="text-shadow"></p>
          </div>
        </div>
      @else
        <div class="carousel-item">
          <img class="d-block img-fluid w-100" src="{{ $img[2]->url.$img[2]->name.".".$img[2]->ext }}" alt="">
          <div class="carousel-caption d-none d-md-block">
            <p class="text-shadow"></p>
          </div>
        </div>
      @endif 
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
  <!-- Fin Carousel -->

  <!-- Noticias -->
  <section>
  <div class="text-center mt-4" >
    <div class="text-heading text-muted text-lg" >Ceniues</div>
    <h1 class="my-2">Noticias</h1>
    <div class="text-justify p-4 my-4" id="noticias">
      <div class="row" style="background-color: #eee3c7;">
        @foreach ($noticias as $noticia)
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <a href="{{ route('front.ver.noticia',$noticia->slug) }}" class="thumbnail">
                  {{-- dd($noticia->imagenes) --}}
                  @foreach ($noticia->imagenes as $imagen)
                    <img style="width: 100%;" class="img-responsive img-article" src="{{ asset('imagenes/noticia/' . $imagen->nombre_file) }}" style="padding-left: 40px;">
                    {{--  @endforeach--}}
                  @endforeach
                </a>
                <hr>
                <a href="{{ route('front.ver.noticia',$noticia->slug) }}" style="text-decoration: none;color:black">
                <h4 class="text-center"><strong>{{ $noticia->titulo }}</strong></h4>
                </a>
                <hr>
                <i class="fa fa-folder-open-o"></i>
                <p style="text-align: justify;">
                  {{ $noticia->descripcion }}
                </p>
                <div class="pull-right">
                  <div class="text-heading text-muted text-sm">
                    <i class="fa fa-clock-o"></i> {{ $noticia->created_at->diffForHumans() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach          
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
          <p style="margin-left: 100px;">{!! $noticias->render() !!}</p>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
    <div class="text-heading text-muted text-lg">
      <strong></strong>
    </div>
  </div>
</section>
  <!-- Fin Noticia -->
</div>

<!-- AREA DE REDES SOCIALES -->
<div class="bg-faded p-4 my-4">
  <hr class="divider">
  <h2 class="text-center text-lg text-uppercase my-0">Escribenos en 
    <strong>Redes Sociales</strong>
  </h2>
  <hr class="divider">
  <p class="text-center"><strong><a href="https://www.facebook.com/ceniueslanguagecenter/" target="_blank"><img style="width: 7%" src="{{ asset('img/facebook-logo.png') }}"></a></strong></p>
</div> 

@endsection

