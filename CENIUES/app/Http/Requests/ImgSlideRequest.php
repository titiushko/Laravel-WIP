<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgSlideRequest extends FormRequest
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
            //
          'name' => 'required|min:4|max:20|unique:sliders',
          'imagen'=> 'required|image|dimensions:min_width=480,max_width=480,min_height=200,max_height=210'
        ];
    }
}
