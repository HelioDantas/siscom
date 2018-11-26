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
        'org_emissor',
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


    public function planos()
    {
        return  $this->belongsToMany('App\Models\Plano', 'sis_paciente_tem_plano','paciente_id', 'plano_id')->withPivot('indicacao', 'situacao', 'carteira')->withTimestamps();

      
    }

    
}
