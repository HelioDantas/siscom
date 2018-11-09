<?php

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

Class Admin extends Authenticable
{

    use Notifiable;
    

    protected $table = 'admin';

    /**
     * o que pode ser populado em massa 
     */
    protected $fillable = [
        'cnpj','nome','banco','agencia','conta','status',
    ];


    protected $hidden =[
        'senha', 'remember_token',
    ];

}