
<ul class="nav nav-pills mb-3 text-uppercase my-0" id="pills-tab" role="tablist">
  <li class="nav-item "  style="padding-top: 10px;width: 155px;margin-right: 15px;">
    <a class="nav-link" href="{{ route('front.cursos') }}">
      Todos&nbsp;&nbsp;
      <span style="color:gray" class="badge">
          {{ $article }}
      </span>
    </a>
  </li>&nbsp;
  @foreach ($cursos as $curso)
    <li class="nav-item " style="padding-top: 10px;width: 155px;margin-right: 15px;">
      <a class="nav-link" href="{{ route('front.searchCurso',$curso->id) }}">
        {{ $curso->nombre_curso }}&nbsp;&nbsp;
        <span style="color:gray" class="badge">
            {{ $curso->articles->where('estado','=','publicado')->count() }}
        </span>
      </a>
    </li>&nbsp;
  @endforeach
  {{--  
  <div class="row">
    <div class="col-md-4 text-center">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong> <p style="margin-left: 100px;">{!! $cursos->links() !!}</p> </strong>
        </h2>
      </div>
  </div>
  --}}
  
</ul>
