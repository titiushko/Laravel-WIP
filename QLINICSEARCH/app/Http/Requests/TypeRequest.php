<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
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
            'type' => 'min:4|max:255|required|unique:types|regex:/^[a-zA-Z[:space:]ñáéíóúÑÁÉÍÓÚ]*$/'
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
            'type.min'      => 'Campo nombre: mínimo de caracteres permitido: 4.',
            'type.max'      => 'Campo nombre: máximo de caracteres permitido: 255.',
            'type.required' => 'Campo nombre: es requerido.',
            'type.unique'   => 'Nombre ya existe.',
            'type.regex'    => 'Campo nombre: debe ser solo letras.'
        ];
    }
}
