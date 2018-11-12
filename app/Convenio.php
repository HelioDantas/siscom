<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $table = "sis_convenio";
    
    public $timestamps = false;

    protected $fillable = array('cnpj', 'nome', 'adesao', 'banco', 'agencia','conta','status' );
}
