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

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/error404', 'Controller@redirectToContentNotFound');

// Búsquedas
Route::post('/busqueda/clinicas', 'HomeController@busquedaClinicas');
Route::get('/busqueda/clinicas/resultado/{busqueda?}', 'HomeController@resultadoBusquedaClinicas');
Route::get('/categorias', 'HomeController@categorias')->name('categorias');

// Valoraciones
Route::post('/valuetions/get', 'HomeController@valoracionClinica');
Route::post('/valuetions/save', 'HomeController@guardarValoracionClinica');

// Páginas Estáticas
Route::get("/conocenos", function () { return view("conocenos"); })->name('conocenos');
Route::get("/faq", function () { return view("faq"); })->name('faq');
Route::get("/contactanos", function () { return view("contactanos"); });
Route::post('/enviar/comentario', 'HomeController@comentario');

// Users
Route::resource('usuarios', 'UsersController');

Route::get('usuarios/destroy/{id}', [
    'uses'=> 'UsersController@destroy',
    'as'  => 'administracion.usuarios.destroy'
]);

Route::get('usuarios/restore/{id}', [
    'uses'=> 'UsersController@restore',
    'as'  => 'administracion.usuarios.restore'
]);

// Change Password
Route::get('password', function () { return view("administracion.usuarios.password"); });
Route::post('usuarios/updatepassword', 'PasswordController@updatePassword');
Auth::routes();

// Types
Route::resource('types', 'TypesController');

// Cities
Route::resource('cities', 'CitiesController');

// Clinics
Route::resource('clinics', 'ClinicsController');
Route::post('clinics/change-state', 'ClinicsController@changeState');
