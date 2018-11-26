<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacienteHasConvenio extends Model
{
    protected $table = 'sis_paciente_tem_plano';
    //public $timestamps = false;


    
    protected $fillable = array(
        'paciente_id',
        'plano_id',
        'carteira',
        'indicacao',
        'situacao',
        'updated_at',
        'created_at',
    );


}
