<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'sis_paciente';
    public $timestamps = false;

    protected $fillable = array();
}
