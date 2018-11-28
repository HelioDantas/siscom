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
            'cpf'   => 'riquired|max:20|exists:Usuario,cpf',
            'senha' => 'riquired|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            'cpf.exists'    => ('Esse Usuario não existe'),
            'cpf.max'       => ('CPF Inválido.'),
            'cpf.min'       => ('CPF Inválido.'),
           
        ];
    }

}
