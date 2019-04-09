<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    
     protected $table = "sis_convenio";
    
    public $timestamps = false;

    protected $fillable = array( 'cnpj', 'nome', 'adesao', 'banco', 'agencia','conta','status' ); 
    

    public function planos(){

     return  $this->hasMany("App\Models\Plano", 'convenio_id', 'id' );

    }

}
