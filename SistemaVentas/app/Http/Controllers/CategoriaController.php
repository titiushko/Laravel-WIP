<?php

namespace SistemaVentas\Http\Controllers;

use Illuminate\Http\Request;
use SistemaVentas\Http\Requests;
use SistemaVentas\Categoria;
use Illuminate\Support\Facades\Redirect;
use SistemaVentas\Http\Requests\CategoriaFormRequest;
use DB;

class CategoriaController extends Controller
{
    public function __construct() {

    }

    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get("buscar"));
            $categorias = DB::table("categoria")->where("nombrecategoria", "LIKE", "%".$query."%")
            ->where("condicioncategoria", "=", true)
            ->orderBy("categoriaid", "desc")
            ->paginate(7);
            return view("almacen.categoria.index", ["categorias" => $categorias, "buscar" => $query]);
        }
    }

    public function create() {
        return view("almacen.categoria.create");
    }

    public function store(CategoriaFormRequest $request) {
        $categoria = new Categoria;
        $categoria->nombrecategoria = $request->get("nombre");
        $categoria->descripcioncategoria = $request->get("descripcion");
        $categoria->condicioncategoria = true;
        $categoria->save();
        return Redirect::to("almacen/categoria");
    }

    public function show($id) {
        return view("almacen.categoria.show", ["categoria" => Categoria::findOrFail($id)]);
    }

    public function edit($id) {
        return view("almacen.categoria.edit", ["categoria" => Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->nombrecategoria = $request->get("nombre");
        $categoria->descripcioncategoria = $request->get("descripcion");
        $categoria->update();
        return Redirect::to("almacen/categoria");
    }

    public function destroy($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->condicioncategoria = false;
        $categoria->update();
        return Redirect::to("almacen/categoria");
    }
}
