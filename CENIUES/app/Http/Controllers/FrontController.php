<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;
use App\Faq;
use App\Slider;
use App\Article;
use App\Curso;
use DB;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;



class FrontController extends Controller
{

	public function __construct()
	{
		Carbon::setlocale('es');
	}
  
	public function index()
	{

		//Obteniendo imagenes de Slide y las noticias con sus portadas
		$imgs = Slider::where('estado','=','agregado')->get();
		$noticia = Noticia::where('estado','=','publicado')->paginate(6);
		$noticia->each(function($noticia){
			$noticia->imagenes;
		});
		//dd($faqs);
		//->with('faqs',$faqs)
		
		return view('front.index')
					->with('img',$imgs)
					->with('noticias',$noticia);
		
	}

	public function contacto()
	{
		return view('front.contacto');
	}

	public function info()
	{
		return view('front.info');
	}

	public function cursos()
	{
                
    $articulos = Article::where('estado','=','publicado')->paginate(6);
		$articulos->each(function($articulos){
			$articulos->files;
			$articulos->curso;
			$articulos->user;
		});
		return view('front.cursos')->with('articulos',$articulos);
	}

	public function admin()
	{
		return view('admin.template.main');
	}

	public function verNoticia($slug)
	{
		//buscar noticia mediante slug
		$noticia = Noticia::where('slug',$slug)->firstOrFail();
		$noticia->user;
		//dd($noticia);
		return view('front.noticia')->with('noticia',$noticia);
	}

	public function verArticulo($slug)
	{
		//buscar articulo mediante slug
		$articulo = Article::where('slug',$slug)->firstOrFail();
		$articulo->user;
		//dd($articulo);
		return view('front.noticia')->with('noticia',$articulo);
	}

	public function searchCurso($id){
		//dd($curso);
		$articulos = Article::where('estado','=','publicado')->where('curso_id','=',$id)->paginate(6);
		$articulos->each(function($articulos){
			$articulos->files;
			$articulos->curso;
			$articulos->user;
		});
		return view('front.cursos')->with('articulos',$articulos);
	}

	/*public function articuloInactivo($id){
  $articles = DB::table('articles')
            ->join('cursos', 'articles.curso_id', '=', 'cursos.id')
            ->join('modulos', 'articles.modulos_id', '=', 'modulos.id')
            ->select(DB::raw("articles.id','articles.titulo','articles.descripcion','articles.contenido','articles.estado','articles.created_at',cursos.nombre_curso,cursos.desc_curso, modulos.nombre_modulo, (CASE WHEN (articles.estado = publicado) THEN 'oculto' END) as estados")
);
   
  
	}*/

}
