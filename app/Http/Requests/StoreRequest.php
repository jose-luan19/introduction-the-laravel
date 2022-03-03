<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>        'required',
            'description'=> 'required|min:5',
            'phone'=>       'required',
            'mobile_phone'=>'required',
            'logo'=>        'image',
        ];
    }

    public function messages(){
        return [
            'required' => 'Este campo é obrigatório',
            'min' => 'Esse campo deve ter no minimo :min caracteres',
            'image' => 'Arquivo não é uma imagem valida'
        ];
    }
}
