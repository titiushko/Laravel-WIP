<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'titulo'    => 'min:10|max:250|required|unique:noticias',
            'contenido' => 'min:20|required',
            'estado'    => 'required',
            'imagen'    => 'required|image|dimensions:min_width=242,max_width=242,min_height=200,max_height=210'
        ];
    }
}
