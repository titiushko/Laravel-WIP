<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNoticiaRequest extends FormRequest
{
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
            'titulo'    => 'min:10|max:250|required|unique:noticias, titulo'.$this->route->parameter('noticia'),
            'contenido' => 'min:20|required',
            'estado'    => 'required'
        ];
    }
}
