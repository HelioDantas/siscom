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
        'Prognostico',
        'bebe',
        'fuma',
        'peso',
        'altura',
        'pressao',
        'temperatura',
        'historico_familiar',
        'problemas',
        'orientacao',
        'observacoes',
        'tempo_atendimeno',
   );
   
}
