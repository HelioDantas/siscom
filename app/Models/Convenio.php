<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    
    protected $table = "sis_convenio";
    
    public $timestamps = false;

    protected $primarykey='sis_convenio_cnpj';


    protected $fillable = array('cnpj', 'nome', 'adesao', 'banco', 'agencia','conta','status');

     public function user(){

        return $this->hasOne('App\Models\User', 'cnpj', 'sis_convenio_cnpj');

    }
}
    