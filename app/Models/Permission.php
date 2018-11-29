<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    

    protected $table = "sis_permissao";
    public $timestamps = false;

      public function permission(){
              return  $this->belongsToMany("App\Models\Permission", 'sis_usuario_tem_permissao','permissao_id', 'usuario_id' );
    }

}
