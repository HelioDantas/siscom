<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    
    protected $table = "sis_funcionario";
    public $timestamps = false;
     protected $primaryKey = 'matricula';

    protected $fillable = array(
        'matricula',
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
        'status',);

    public function user(){

        return $this->hasOne('App\Models\User', 'Sis_funcionario_matricula', 'matricula');

    }

    public function medico(){

        return $this->hasOne('App\Models\Medico', 'Sis_funcionario_matricula', 'matricula');

    }

 
}
