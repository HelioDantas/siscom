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
        'nome','email','senha',
    ];


    protected $hidden =[
        'senha', 'remember_token',
    ];

}