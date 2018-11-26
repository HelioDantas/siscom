<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    //
    protected $table = "sis_plano";
    public $timestamps = false;


    protected $fillable = array(
        'paciente_id',
        'covenio_id',
        'nome',
        'status',
      
        
       );


       public function convenio(){
        return $this->belongsTo('App\Models\Convenio', 'cnpj');
    

    }

    public function pacientes(){

        return  $this->belongsToMany("App\Models\Paciente", 'sis_paciente_tem_plano','plano_id', 'paciente_id')->withPivot('indicacao', 'situacao')->withTimestamps();
;
   
       }

}
