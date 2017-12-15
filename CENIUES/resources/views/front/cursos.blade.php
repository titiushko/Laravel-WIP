@extends('front.template.main')

@section('title','Cursos')

@section('encabezado','CURSOS')

@section('content')
<div class="bg-faded p-4 my-4">
  
<br>

<div class="row">
  <div class="col-md-12">

    <!-- Son las pestañas de los cursos-->
    @include('front.template.partials.area')
    
  </div>
</div>
<hr>
<div class="container">
  <br>
    {{-- dd($frances) --}}
    <div class="row">
      @foreach ($articulos as $noticia)
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <a href="{{ route('front.ver.noticia_curso',$noticia->slug)}}" class="thumbnail">
                {{-- dd($noticia->imagenes) --}}
                @foreach ($noticia->files as $imagen)
                  <img class="img-responsive img-article" src="{{ asset('img/article_docente/' . $imagen->nombre_file) }}" style="padding-left: 40px; width: 100%">
                @endforeach
                {{--  @endforeach--}}
              </a>
              <hr>
              <a href="{{route('front.ver.noticia_curso',$noticia->slug)}}" style="text-decoration: none;color:black">
              <h4 class="text-center"><strong>{{ $noticia->titulo }}</strong></h4>
              </a>
              <hr>
              <i class="fa fa-folder-open-o"></i>
              <p style="text-align: justify;">
                {{ $noticia->descripcion }}
              </p>
              <div class="pull-right">
                <div class="text-heading text-muted text-sm">
                  <i class="fa fa-clock-o"> </i> {{ $noticia->created_at->diffForHumans() }}
                  <i style="padding-left: 140px">
                    <a href="{{ route('front.searchCurso',$noticia->curso->id)}}">
                      {{ $noticia->curso->nombre_curso }}
                    </a>
                  </i>
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
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong> <p style="margin-left: 100px;">{!! $articulos->render() !!}</p> </strong>
        </h2>
      </div>
      <div class="col-md-4"></div>
    </div>

</div>

</div>
@endsection