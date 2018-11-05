<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'sis_usuario';

    public $timestamps = false;

    protected $fillable = array('nome','senha','cpf','email');

    public function getAuthPassword(){
        return $this->senha;
    }

   
}
