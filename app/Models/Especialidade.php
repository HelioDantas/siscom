<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $table = 'sis_especialidade';
    public $timestamps = false;

 public function Medico(){
 return  $this->belongsToMany("App\Models\Medico", 'sis_medico_tem_especialidade','Sis_especialidade_id', 'Sis_medico_funcionario_matricula');

 }

 function procedimentos(){
    return $this->hasMany('App\Models\Procedimento');
 }


}
