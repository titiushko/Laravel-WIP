<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'      =>'min:3|max:100|required|regex:/^[a-z\sáéíóú]+$/i',
            'surname'   =>'min:3|max:100|required|regex:/^[a-z\sáéíóú]+$/i',
            'email'     =>'min:4|max:100|required|unique:users',
            'role'       =>'required',
            'password'  =>'min:5|max:100|required'
        ];
    }

   public function messages(){
            return [

                'name.required'     => 'El campo Nombres es requerido',
                'name.min'          => 'El mínimo permitido para Nombres son 3 caracteres',
                'name.max'          => 'El maximo permitido para Nombres son 100 caracteres',
                'name.regex'        => 'El campo Nombres solo acepta letras',

                'surname.required'  => 'El campo Apellidos es requerido',
                'surname.min'       => 'El mínimo permitido para Apellidos son 3 caracteres',
                'surname.max'       => 'El maximo permitido para Apellidos son 100 caracteres',
                'surname.regex'     => 'El campo Apellidos solo acepta letras',

                'email.required'    => 'El campo email es requerido',
                'email.min'         => 'El minimo de caracteres debe de ser de 4',
                'email.max'         => 'Supero el maximo de caracteres',
                'email.unique'      => 'El campo Correo Electrónico ya esta en uso',



                'role.required'     => 'El campo Rol es requerido',
            ];
        }
}
