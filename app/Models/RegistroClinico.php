<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico extends Model
{
   protected $table = "sis_registro_clinico";
   public $timestamp = false;
   protected  $fillable = array(
        'agenda_id',
        'paciente_id',
        'quexaPrincipal',
        'historia',
        'tempo_atendimento',
        'prognostico',
        'medicamento',
        'observacoes',
        'orientacao', 
        'problemas', 
        'historia',
        'historicoFamiliar',
        'obsPessoal',
        'temperatura',
        'pulso',
        'pressao',
        'altura',
        'peso',
        'fisico',
        'fuma',
        'bebe',
   );
   
    public function agenda(){

     return  $this->hasMany("App\Models\Agenda", 'agenda_id', 'id' );

    }



}
