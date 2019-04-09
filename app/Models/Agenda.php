<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{

    
    protected $table = 'sis_agenda';
    public $timestamps = false;
    protected $fillable = array(
        'paciente',
        'paciente_id',
        'primeiraVez',
        'medico', 
        'dataDeNascimento',
        'cpf',
        'procedimento_id',
        'plano',
        'medico',
        'atendente',
        'data',
        'valor',
        'hora',
        'compareceu',
        'telefone',
        'celular',
        'pago',
        'obs',
        'idMedico',
        'ultimaConsulta',
        'obs',
        'status',
        'atendido',
    );

        public function registro(){

            return  $this->hasOne("App\Models\RegistroClinico", 'agenda_id', 'id'  );

    }


}
