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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'nome'                  => 'required',
        'cpf'                   => 'required|min:11|max:14',
        'identidade'            => 'nullable|max:14',
        'dataDeNascimento'      => 'nullable',
        'sexo'                  => 'nullable',
        'etnia'                 => 'nullable',
        'nacionalidade'         => 'nullable',
        'naturalidade'          => 'nullable',
        'escolaridade'          => 'nullable',
        'rua'                   => 'nullable',
        'numero'                => 'nullable',
        'bairro'                => 'nullable',
        'cep'                   => 'nullable',
        'cidade'                => 'required',
        'estado'                => 'required',
        'telefone'              => 'nullable|max:15',
        'celular'               => 'required|max:15',
        'email'                 => 'required|email',
        'profissao'             => 'nullable',
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
