<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class procedimento extends Model
{
    protected $table = 'sis_procedimento';
    public $timestamps = false;

     
    protected $primaryKey = 'codTuss';
    
    protected $fillable = array('especialidade_id','codtuss','descricao','preco');



    public function especialidade(){

      return  $this->belongsTo("App\Models\Especialidade" ,'id','especialidade_id');
    }



    public function planoProcedimento(){

        return  $this->belongsTo("App\Models\Plano", 'procedimento_id','plano_id');
    } 

}
