<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'sis_usuario';

    public $timestamps = false;

    protected $fillable = array('nome','senha','cpf','email');

    public static function buscar($cpf){

     return DB::table('sis_usuario')->where('cpf', $cpf)->first();
    }

    public function permissoes(){
        return $this->hasMany(PermisssaoUsuario::class); // a ser implementado
    }


   public function funcionario(){

        return $this->hasOne('App\sis_funcionario', 'Sis_funcionario_matricula', 'matricula');
    }




}
