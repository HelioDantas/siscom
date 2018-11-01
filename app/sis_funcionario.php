<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sis_funcionario extends Model
{

    protected $table = "sis_funcionario";
    public $timestamps = false;

    protected $fillable = array('matricula', 'nome', 'cpf', 'identidade');




}
