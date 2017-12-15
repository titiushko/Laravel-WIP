<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rutas de la Pagina Web
Route::get('/',[
	'uses' 	=> 'FrontController@index',
	'as'	=> 'front.index'
]);
Route::get('contacto/',[
	'uses' 	=> 'FrontController@contacto',
	'as'	=> 'front.contacto'
]);
Route::get('info/',[
	'uses' 	=> 'FrontController@info',
	'as'	=> 'front.info'
]);
Route::get('cursos/',[
	'uses' 	=> 'FrontController@cursos',
	'as'	=> 'front.cursos'
]);

Route::get('noticia/{slug}',[
	'uses' 	=> 'FrontController@verNoticia',
	'as'	=> 'front.ver.noticia'
]);

Route::get('noticia_curso/{slug}',[
	'uses' 	=> 'FrontController@verArticulo',
	'as'	=> 'front.ver.noticia_curso'
]);

Route::get('cursos/{name}',[
	'uses' 	=> 'FrontController@searchCurso',
	'as'	=> 'front.searchCurso'
]);



//Ruta para entrar al Panel de Admin
Route::get('admin','FrontController@admin');

//Grupo de Direcciones del panel de Administracion
Route::group(['prefix'=>'admin'],function(){

	//Grupo de Rutas exclusivas para Administrador
	Route::group(['middleware'=>'admin'],function(){

		// Gestion de Usuarios
		Route::resource('users','UsersController');
		//Para eliminar Usuario
		Route::get('users/{id}/destroy',[
			'uses'	=>	'UsersController@destroy',
			'as'	=>	'users.destroy'
		]);
		//Muestra los Usuarios Inactivos
		Route::get('/deshabilitado',[
			'uses'	=> 'UsersController@inactivo',
			'as'	=> 'users.inactivo'
		]);
		//Para activar Usuario
		Route::get('{id}/habilitar',[
			'uses'	=>	'UsersController@habilitar',
			'as'	=>	'users.habilitar'
		]);
		//Para llamar form de cambio de Password desde panel Admin
		Route::get('{id}/password',[
			'uses'	=>	'UsersController@passwordAdmin',
			'as'	=>	'admin.password'
		]);
		//Metodo para cambio de password desde admin
		Route::post('passAdmin',[
			'uses'	=>	'UsersController@storePassAdmin',
			'as'	=>	'user.password'
		]);
		/*-------------------------------------------------*/
		//Gestion de FAQs
		Route::resource('faqs','FaqsController');
		//Para eliminar FAQs
		Route::get('faqs/{id}/destroy',[
			'uses'	=>	'FaqsController@destroy',
			'as'	=>	'faqs.destroy'
		]);
		/*-------------------------------------------------*/
		//Gestion de Cursos
		Route::resource('cursos','CursosController');
		//Para eliminar curso
		Route::get('cursos/{id}/destroy',[
			'uses'	=>	'CursosController@destroy',
			'as'	=>	'cursos.destroy'
		]);
		/*-------------------------------------------------*/
		//Gestion de Noticias de Administrador
		Route::resource('noticias','NoticiasController');
		//Para eliminar Noticia de Administrador
		Route::get('noticias/{id}/destroy',[
			'uses'	=>	'NoticiasController@destroy',
			'as'	=>	'noticias.destroy'
		]);
		//cambia el estado de la Noticia a publicado
		Route::get('noticias/{id}/public',[
			'uses'	=>	'NoticiasController@publicar',
			'as'	=>	'noticias.publicar'
		]);
		//cambia el estado de la Noticia a oculto
		Route::get('noticias/{id}/hidden',[
			'uses'	=>	'NoticiasController@ocultar',
			'as'	=>	'noticias.ocultar'
		]);

		/*-------------------------------------------------*/
		//Gestion de Publicaciones de Docentes Desactivos por el Administrador
		Route::resource('articulos','ArticlesDocenteController');
		//Para eliminar publicacion de docentes inactivos por el administrador
		Route::get('articulos/{id}/destroy',[
			'uses'	=>	'ArticlesDocenteController@destroy',
			'as'	=>	'articulos.destroy'
		]);


		/*------------------------------------------------------*/
		//Gestion de Publicaciones de Docentes Activos por el administrador
		Route::resource('publicaciones', 'PublicacionesDocenteController');
		//Para eliminar publicacin de docentes activos por el administrador
		Route::get('publicaciones/{id}/destroy', [
			'uses'	=>	'PublicacionesDocenteController@destroy',
			'as'	=>	'publicaciones.destroy'
		]);
		//cambia el estado de la publicacion de los docentes activos a publicado
		Route::get('publicaciones/{id}/public',[
			'uses'	=>	'PublicacionesDocenteController@publicado',
			'as'	=>	'publicaciones.publicado'
		]);
		//cambia el estado de la publicacion de los docentes activos a oculto
		Route::get('publicaciones/{id}/hidden',[
			'uses'	=>	'PublicacionesDocenteController@oculto',
			'as'	=>	'publicaciones.oculto'
		]);

		

		
		/*------------------------------------------------*/
		//Controlador de Galeria de Imagenes que usa el Slide Admin
		Route::resource('slide','SlideController');
		//Para eliminar imagen de la galeria
		Route::get('slide/{id}/destroy',[
			'uses'	=>	'SlideController@destroy',
			'as'	=>	'img_slide.destroy'
		]);
		//cambia el estado de la imagen "agregado"
		Route::get('slide/{id}/agregar',[
			'uses'	=>	'SlideController@agregar',
			'as'	=>	'img_slide.agregar'
		]);
		//cambia el estado a oculto
		Route::get('slide/{id}/quitar',[
			'uses'	=>	'SlideController@quitar',
			'as'	=>	'img_slide.quitar'
		]);
	});

	//Rutas para Docentes
	/*---------------------------------------------------*/
	//Para llamar form de cambio de Password desde cada perfil
	Route::get('password',[
		'uses'	=>	'UsersController@password',
		'as'	=>	'perfil.password'
	]);
	//Metodo para cambio de Password desde perfil
	Route::post('updatepassword',[
		'uses'	=>	'UsersController@updatePassword',
		'as'	=>	'profile.password'
	]);
	/*--------------------------------------------------*/
	//Gestion de Articulos de Docentes
	Route::resource('articles','ArticlesController');
	//Para eliminar Articulo de Docente
	Route::get('articles/{id}/destroy',[
		'uses'	=>	'ArticlesController@destroy',
		'as'	=>	'articles.destroy'
	]);
	//cambia el estado del Articulo a publicado
	Route::get('articles/{id}/public',[
		'uses'	=>	'ArticlesController@publicar',
		'as'	=>	'articles.publicar'
	]);
	//cambia el estado del articulo a oculto
	Route::get('articles/{id}/hidden',[
		'uses'	=>	'ArticlesController@ocultar',
		'as'	=>	'articles.ocultar'
	]);

	/*--------------------------------------------------------------------------*/
	//Get para el select de modulos
	Route::get('articles/modulos/{id}', 'ArticlesController@getModulos');

	//Get para el select de modulos
	//Route::get('modulos/{id}','ArticlesController@getModulos');
});

//Get para el select de modulos
Route::get('modulos/{id}','ArticlesController@getModulos');


/*RUTAS PARA AUTENTICACION*/
//Muestra el login de Autenticacion
Route::get('admin/auth/login', [
    'uses'  => 'Auth\LoginController@showLoginForm',
    'as'    => 'admin.auth.login'
]);
//Recibe los datos del formulario de login
Route::post('admin/auth/login', [
    'uses'  => 'Auth\LoginController@login',
    'as'    => 'admin.auth.login'
]);
//Cerrar Sesion
Route::get('admin/auth/logout', [
    'uses'  => 'Auth\LoginController@logout',
    'as'    => 'admin.auth.logout'
]);
