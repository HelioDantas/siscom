<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceds extends Model
{
    
     protected $table = "sis_proced_clinico";
    
    public $timestamps = false;

    protected $fillable = array( 'id', 'nome','preco','id_lab'); 
    
}
