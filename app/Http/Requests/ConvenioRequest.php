<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioRequest extends FormRequest
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
        'nome'                  => 'required|max:25',
        'cnpj'                  => 'required|min:16|max:17',
        'adesao'                => 'required|date',
        'banco'                 => 'nullable|max:25',
        'agencia'               => 'nullable|max:17',
        'conta'                 => 'nullable|max:17',
        'status'                => 'required',
 
   
        ];
    }
}
