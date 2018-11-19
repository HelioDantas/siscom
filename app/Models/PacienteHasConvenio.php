<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacienteHasConvenio extends Model
{
    protected $table = 'sis_paciente_tem_convenio';
    public $timestamps = false;


    
    protected $fillable = array(
        'carteira',
        'indicacao',
        'situacao',
    );


}
