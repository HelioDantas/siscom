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
        'plano_id',
        'carteira',
        'indicacao',
        'situacao',
        
       );


       public function convenio(){
        return $this->belongsTo('App\Models\Convenio', 'cnpj');
    

    }

    public function pacientes(){

        return  $this->belongsToMany("App\Models\Paciente", 'sis_paciente_tem_plano','plano_id', 'paciente_id');
   
       }
}
