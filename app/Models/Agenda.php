<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{

    
    protected $table = 'sis_agenda';
    public $timestamps = false;
    protected $fillable = array('paciente','medico', );

}