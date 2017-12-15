{{--  dd($faqs)  --}}
  <hr class="divider">
  <h2 class="text-center text-lg text-uppercase my-0">Preguntas
    <strong>Frecuentes</strong>
  </h2>
  <hr class="divider">
  <div class="row">
    <div class="col-md-3">
      <img class="img-fluid float-left mr-4 d-none d-lg-block" style="border:solid; border-color:gray " src="img/pregunta.jpg" alt="">
    </div>
    <div class="col-md-9">
      @foreach ($faqs as $faq)
        <h5><strong>{{ $faq->pregunta }}</strong></h5>
        <p style="text-align: justify;">{!! $faq->respuesta !!}</p>  
      @endforeach
      {{-- Renderizado para la paginacion --}}
      <div class="text-center">
        {!! $faqs->render() !!}
      </div>
  
    </div>
  </div>
