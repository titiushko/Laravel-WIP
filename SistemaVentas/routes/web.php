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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/primera/ruta", function () {
    return "Hola Mundo!";
});

Route::get("publicacion/{publicaciones}/comentario/{comentarios}", function ($publicacionId, $comentarioId) {
    return "<h1>Publicación número:</h1><i>".$publicacionId."</i><br><h1>Comentario número:</h1><i>".$comentarioId."</i>";
});

Route::get("/suma/{numero1?}/{numero2?}", function ($numero1 = 1, $numero2 = 1) {
    return $numero1 + $numero2;
})->where(["numero1" => "\d+", "numero2" => "\d+"]);

Route::post("/saludo/{nombre?}", function ($nombre = "usuario") {
    return "Hola ".$nombre;
})->where("nombre", "[a-zA-Z]+");	// Restringir los caracteres permitidos del parámetro $nombre mediante una expresión regular
