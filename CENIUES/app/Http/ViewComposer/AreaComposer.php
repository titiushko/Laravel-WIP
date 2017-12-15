<?php  

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Curso;
use App\Article;

class AreaComposer {
	
	public function compose(View $view)
	{
		//$cursos = Curso::orderBy('id','DESC')->paginate(3);
		$cursos = Curso::all();
		$article = Article::where('estado', '=', 'publicado')->count();
		$view->with('cursos',$cursos)
			->with('article',$article);
	}
	
}