<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Models;

class Convenio extends Model
{
    
    protected $table = "sis_convenio";
    
    public $timestamps = false;

    protected $primarykey='sis_convenio_cnpj';

    protected $fillable = array('cnpj', 'nome', 'adesao', 'banco', 'agencia','conta','status'
    
    );
}
    