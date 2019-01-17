<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labs extends Model
{
    
     protected $table = "sis_laboratorio";
    
    public $timestamps = false;

    protected $fillable = array( 'id', 'nome', 'preco', 'id_procedimento'); 
    
}
