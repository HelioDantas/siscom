<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    //
    protected $table = "sis_plano";
    public $timestamps = false;


    protected $fillable = array(

        'convenio_id',
        'carteira',
        'indicacao',
        'nome',
        'situacao',

        
       );


       public function convenio(){
        return $this->belongsTo('App\Models\Convenio','convenio_id', 'id' );
    

    }

    public function pacientes(){

        return  $this->belongsToMany("App\Models\Paciente", 'sis_paciente_tem_plano','plano_id', 'paciente_id')->withPivot('indicacao', 'situacao')->withTimestamps();

   
       }

       function procedimentos(){
        return $this->belongsToMany('App\Models\Procedimento','sis_plano_procedimento','plano_id','procedimento_id')->withPivot('precoPlano');
     }

}
