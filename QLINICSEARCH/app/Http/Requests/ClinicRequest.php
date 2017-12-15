<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
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
            'name' => 'min:4|max:255|required|regex:/^[a-zA-Z[:space:]ñáéíóúÑÁÉÍÓÚ]*$/',
            'services' => 'min:50|required|string',
            'description' => 'min:50|required|string',
            'facebook' => 'min:10|max:255|required|regex:/^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/',
            'website' => 'min:10|max:255|required|regex:/[-a-zA-Z0-9@:%_\+.~\#?&\/=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&\/=]*)?/',
            'address' => 'min:10|required|string',
            'telephone' => 'min:8|required|string',
            'type_id' => 'required',
            'city_id' => 'required'
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
            // name
            'name.min' => 'Campo nombre: mínimo de caracteres permitido: 4.',
            'name.max' => 'Campo nombre: máximo de caracteres permitido: 255.',
            'name.required' => 'Campo nombre: es requerido.',
            'name.regex' => 'Campo nombre: debe ser solo letras.',
            // services
            'services.min' => 'Campo servicios: mínimo de caracteres permitido: 50.',
            'services.required' => 'Campo servicios: es requerido.',
            // description
            'description.min' => 'Campo descripción: mínimo de caracteres permitido: 50.',
            'description.required' => 'Campo descripción: es requerido.',
            // facebook
            'facebook.min' => 'Campo facebook: mínimo de caracteres permitido: 10.',
            'facebook.max' => 'Campo facebook: máximo de caracteres permitido: 255.',
            'facebook.required' => 'Campo facebook: es requerido.',
            'facebook.regex' => 'Campo facebook: debe ser url válida de facebook.',
            // website
            'website.min' => 'Campo sitio web: mínimo de caracteres permitido: 10.',
            'website.max' => 'Campo sitio web: máximo de caracteres permitido: 255.',
            'website.required' => 'Campo sitio web: es requerido.',
            'website.regex' => 'Campo sitio web: debe ser url válida.',
            // address
            'address.min' => 'Campo dirección: mínimo de caracteres permitido: 10.',
            'address.required' => 'Campo dirección: es requerido.',
            // telephone
            'telephone.digits' => 'Campo teléfono: mínimo de caracteres permitido: 8.',
            'telephone.required' => 'Campo teléfono: es requerido.',
            // type_id
            'type_id.required' => 'Campo tipo de clínica: es requerido.',
            // city_id
            'city_id.required' => 'Campo ciudad: es requerido.'
        ];
    }
}
