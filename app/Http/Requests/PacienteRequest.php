<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
        'nome'                  => 'required|max:10',
        'cpf'                   => 'required|min:14|max:15',
        'identidade'            => 'nullable|min:11|max:12',    
        'dataDeNascimento'      => 'nullable|date',
        'sexo'                  => 'nullable',
        'etnia'                 => 'nullable',
        'nacionalidade'         => 'nullable|max:16',
        'naturalidade'          => 'nullable|max:16',
        'escolaridade'          => 'nullable',
        'rua'                   => 'nullable|max:40',
        'numero'                => 'nullable|max:7',
        'bairro'                => 'nullable|max:15',
        'cep'                   => 'nullable|max:15',
        'cidade'                => 'required|max:15',
        'estado'                => 'required|max:15',   
        'telefone'              => 'nullable|min:14|max:14',
        'celular'               => 'required|min:15max:15',
        'email'                 => 'required|email',
        'profissao'             => 'nullable|max:14',
        'status'                => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.exists'     => trans('Esse cliente não existe'),
            'nome.required' => trans('O campo nome é obrigatório.'),
            'sexo.in'       => trans('Sexo inválido.'),
            'cpf.integer'   => trans('CPF deve conter apenas números.'),
            'cpf.max'       => trans('CPF Inválido.'),
            'cpf.min'       => trans('CPF Inválido.'),
            'rg.max'        => trans('RG deve conter apenas números.'),
            'telefone.max'  => trans('Telefone inválido.'),
            'celular.max'   => trans('Celular inválido.'),
            'cep.max'       => trans('CEP Inválido.'),
            'uf.max'        => trans('UF Inválido.'),
        ];
    }
}
