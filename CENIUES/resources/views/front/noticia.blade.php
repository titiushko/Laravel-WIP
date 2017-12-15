
@extends('front.template.main')

@section('title',$noticia->titulo)

@section('encabezado','CENIUES')

@section('content')
<div class="bg-faded p-4 my-4">
  <hr class="divider">
  <h2 class="text-center text-lg text-uppercase my-0">
    <strong>{{ $noticia->titulo }}</strong>
  </h2>
  <hr class="divider">
  <div>
    <h6 class="text-center text-sm my-2"><i>Creado por:&nbsp;{{ $noticia->user->name.' '.$noticia->user->apellido }}</i></h6>
    <h6 class="text-center text-sm my-2"><i>{{ $noticia->created_at->format('d/m/Y') }}</i></h6>
  </div>
  <div id="container" align="center">
    <!--Contenido a mostrar/ocultar-->
    <div id="content" style="overflow:scroll; background:#eee3c7; color: black; width: 95%; padding: 3%">
      <p style="text-align: justify;">
        {!! $noticia->contenido !!}
      </p>
    </div>
    <hr>
    {{-- PARTE DE DISQUS, SISTEMA DE COMENTARIOS  
          cuenta para Disqus
          cta: ceniues.tpi2017@gmail.com
          pass: ceniues2017
      --}}
      <h3><strong>Comentarios</strong></h3>
      <div id="disqus_thread"></div>
        <script>

        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://ceniues-ues-com.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    {{-- PARTE DE DISQUS, SISTEMA DE COMENTARIOS  --}}
    
  </div>
</div>
@endsection
  
