<?php

namespace SistemaVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = "categoria";
	protected $primaryKey = "categoriaid";
	public $timestamps = false;

    protected $fillable = [
        "nombrecategoria",
        "descripcioncategoria",
        "condicioncategoria"
    ];

    protected $guarded = [];
}
