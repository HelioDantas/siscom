<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'sis_paciente';
    public $timestamps = false;

    protected $fillable = array(
        'nome',
        'cpf',
        'identidade',
        'dataDeNascimento',
        'sexo',
        'etnia',
        'nacionalidade',
        'naturalidade',
        'escolaridade',
        'rua',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'telefone',
        'celular',
        'email',
        'profissao',
        'status',
    );


    public function plano()
    {
        return $this->hasOne('App\Models\Plano');
    }

    
}
