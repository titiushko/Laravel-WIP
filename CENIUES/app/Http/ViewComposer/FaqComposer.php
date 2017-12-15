<?php  

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\Faq;

class FaqComposer {
	
	public function compose(View $views)
	{
		//$cursos = Curso::orderBy('id','DESC')->paginate(3);
		$faqs = Faq::paginate(5);
		$views->with('faqs',$faqs);
	}
	
}