<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'sis_medico';
    public $timestamps = false;

     
    protected $primaryKey = 'Sis_funcionario_matricula';
    
    protected $fillable = array('Sis_funcionario_matricula','crm');

    public function especialidade(){

      return  $this->belongsToMany("App\Models\Especialidade", 'sis_medico_tem_especialidade','Sis_medico_funcionario_matricula', 'Sis_especialidade_id');
    }


    public function funcionario(){

        return $this->belongsTo("App\Models\Funcionario", 'Sis_funcionario_matricula', 'matricula');

    }


    public function planos(){

        return  $this->belongsToMany("App\Models\Plano", 'sis_medico_tem_plano','medico_id', 'plano_id')->withPivot('status');
    }



}
