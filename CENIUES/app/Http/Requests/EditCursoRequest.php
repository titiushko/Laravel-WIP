<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class EditCursoRequest extends FormRequest
{

   /* public function __construct(Route $route){

        $this->route = $route;

    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre_curso' =>'required|string|min:5|max:50|unique:cursos,nombre_curso,'.$this->route->parameter('curso'),
            'desc_curso' => 'string'
        ];
    }
}
