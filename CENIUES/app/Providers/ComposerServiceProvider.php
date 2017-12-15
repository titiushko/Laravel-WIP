<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   *
   * @return void
   */
  public function boot()
  {
    //carga el viewcomposer y envoar datos a la vista para
    //parametros: vista que se  desea cargar, namespace de viewcomposer
    View::composer(['front.cursos'],'App\Http\ViewComposer\AreaComposer');
    View::composer(['front.contacto'],'App\Http\ViewComposer\FaqComposer');

  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
      //
  }
}
