@extends('front.template.main')

@section('title','Contacto')

@section('encabezado','CONTACTENOS')

@section('content')
<div class="bg-faded p-4 my-4">
  <hr class="divider">
  <h2 class="text-center text-lg text-uppercase my-0">
    <strong>Contacto</strong>
  </h2>
  <hr class="divider">
  <div class="row">
    <div class="col-lg-9">
      <div class="embed-responsive embed-responsive-16by9 map-container mb-4 mb-lg-0">
      
        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.0115149871144!2d-89.2049886567215!3d13.717752309941774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6330865a137af3%3A0x6009c61f57ff1f!2sCENIUES!5e0!3m2!1ses!2sco!4v1507089300387"></iframe>
       
      </div>
    </div>
    <div class="col-lg-3">
      <br>
      <br>
      <h5 class="mb-0">Telefono:</h5>
      <div class="mb-4">+ 503 2511-2000</div>
      <div class="mb-4">
      </div>
      <h5 class="mb-0">Direcci&oacute;n:</h5>
      <div class="mb-4">
        Ciudad Universitaria
        <br>
        San Salvador
      </div>
    </div>
  </div>
</div>

<!-- Area de Faqs -->
<div class="bg-faded p-4 my-4">
  @include('front.template.partials.faqs')
</div>

<div class="bg-faded p-4 my-4 text-center">
   <hr class="divider">
   Escribenos <br>
   <a href="mailto:ceniues.tpi2017@gmail.com"><img style="width: 7%" src="{{ asset('img/message.png') }}"></a>
   <hr class="divider">
  <a href="mailto:name@example.com"></a>
</div>
@endsection

@section('js')
  <!-- Zoom when clicked function for Google Map -->
  <script>
    $('.map-container').click(function () {
      $(this).find('iframe').addClass('clicked')
    }).mouseleave(function () {
      $(this).find('iframe').removeClass('clicked')
    });
  </script>
@endsection

