<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{


    use Notifiable;

    protected $table = 'sis_usuario';

    public $timestamps = false;

    protected $fillable = array('nome','senha','cpf','email', 'Sis_funcionario_matricula');

    public static function buscar($cpf){

   return  User::where('cpf', $cpf)->first();
        //return $this->whereKey($cpf)->first('cpf');
    }

    public static function buscarByEmail($email){

        return  DB::table('sis_usuario')->where('email', $email)->first();

         }

    public function permission(){
              return  $this->belongsToMany("App\Models\Permission", 'sis_usuario_tem_permissao','usuario_id', 'permissao_id');
    }


   public function funcionario(){

        return $this->belongsTo('App\Models\Funcionario', 'Sis_funcionario_matricula', 'matricula');
    }



    public function getAuthPassword(){
        return $this->senha;
    }


}
