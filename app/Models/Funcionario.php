<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    
    protected $table = "sis_funcionario";
    public $timestamps = false;

    protected $fillable = array('matricula', 'nome', 'cpf', 'identidade', 'profissao' );

    public function user(){

        return $this->hasOne('App\Models\User', 'matricula', 'Sis_funcionario_matricula');

    }

    public function medico(){

        return $this->hasOne('App/Models/Medico', 'matricula', 'Sis_funcionario_matricula');

    }
}
