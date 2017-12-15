<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => 'min:4|max:255|required|unique:cities|regex:/^[a-zA-Z[:space:]ñáéíóúÑÁÉÍÓÚ]*$/'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.min'      => 'Campo nombre: mínimo de caracteres permitido: 4.',
            'name.max'      => 'Campo nombre: máximo de caracteres permitido: 255.',
            'name.required' => 'Campo nombre: es requerido.',
            'name.unique'   => 'Nombre ya existe.',
            'name.regex'    => 'Campo nombre: debe ser solo letras.'
        ];
    }
}
