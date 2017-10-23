<?php

namespace SistemaVentas\Http\Controllers;

use Illuminate\Http\Request;
use SistemaVentas\Http\Requests\CategoriaFormRequest;
use SistemaVentas\Categoria;
use SistemaVentas\Support\Facades\Redirect;
use DB;

class CategoriaController extends Controller
{
    public function __construct() {

    }

    public function index(Request $request) {
    	if ($request) {
    		$query = trim($request->get("searchText"));
    		$categorias = DB:table("categoria")->where("nombrecategoria", "LIKE", "%".$query."%")
    		->where("condicioncategoria", "=", true)
    		->orderBy("categoriaid", "desc")
    		->paginate(7);
    		return view("almacen.categoria.index", ["categorias" => $categorias, "searchText" => $query]);
    	}
    }

    public function nuevo() {
    	return view("almacen.categoria.nuevo");
    }

    public function guardar(CategoriaFormRequest $request) {
    	$categoria = new Categoria;
    	$categoria->nombrecategoria = $request->get("nombre");
    	$categoria->descripcioncategoria = $request->get("descripcion");
    	$categoria->condicioncategoria = true;
    	$categoria->save();
    	return Redirect::to("almacen/categoria");
    }

    public function ver($id) {
    	return view("almacen.categoria.ver", ["categoria" => Categoria::findOrFail($id)]);
    }

    public function editar($id) {
    	return view("almacen.categoria.editar", ["categoria" => Categoria::findOrFail($id)]);
    }

    public function actualizar(CategoriaFormRequest $request, $id) {
    	$categoria = Categoria::findOrFail($id);
    	$categoria->nombrecategoria = $request->get("nombre");
    	$categoria->descripcioncategoria = $request->get("descripcion");
    	$categoria->update();
    	return Redirect::to("almacen/categoria");
    }

    public function eliminar($id) {
    	$categoria = Categoria::findOrFail($id);
        $categoria->condicioncategoria = false;
    	$categoria->update();
    	return Redirect::to("almacen/categoria");
    }
}
