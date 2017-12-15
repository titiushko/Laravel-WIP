<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Routing\Route;

class EditUserRequest extends FormRequest
{

   private $route;
    public function  __construct(Route $route)
    {
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
            'name' => 'required|string|min:3|max:100',
            'apellido' => 'required|string|min:3|max:100',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->route->parameter('user'),
            'password' => '',
            'type' => 'required',
            'tel_fijo' => 'digits:8',
            'tel_movil' => 'digits:8'
        ];
    }
}
