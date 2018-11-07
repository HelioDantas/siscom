<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'sis_medico';
    public $timestamps = false;

    public function especialidade(){

      return  $this->belongsToMany("App/Especialidade", 'sis_medico_tem_especialidade','Sis_medico_funcionario_matricula', 'Sis_especialidade_id');
    }


    public function funcionario(){

        return $this->belongsTo("App/Models/Funcionario", 'Sis_funcionario_matricula', 'matricula');

    }

}
