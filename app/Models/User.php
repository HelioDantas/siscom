<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'sis_usuario';

    public $timestamps = false;

    protected $fillable = array('nome','senha','cpf','email', 'Sis_funcionario_matricula');

    public static function buscar($cpf){

   return  DB::table('sis_usuario')->where('cpf', $cpf)->first();
        //return $this->whereKey($cpf)->first('cpf');
    }

    public static function buscarByEmail($email){

        return  DB::table('sis_usuario')->where('email', $email)->first();
             
         }

    public function permissoes(){
        return $this->hasMany(PermisssaoUsuario::class); // a ser implementado
    }


   public function funcionario(){

        return $this->belongsTo('App\Models\Funcionario', 'Sis_funcionario_matricula', 'matricula');
    }



    public function getAuthPassword(){
        return $this->senha;
    }


}
