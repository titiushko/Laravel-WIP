<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use App\Faq;

class EditFaqRequest extends FormRequest
{

    private $route;

    public function __construct(Route $route){

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
            'pregunta' => 'required|string|min:10|max:255|unique:faqs,pregunta,'.$this->route->parameter('faq'),
            'respuesta' =>'string|required'
        ];
    }
}
