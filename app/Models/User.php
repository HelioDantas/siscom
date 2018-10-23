<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = array('nome','senha','cpf','email');

    public function permissoes(){
        return $this->hasMany(PermisssaoUsuario::class); // a ser implementado
    }
}
