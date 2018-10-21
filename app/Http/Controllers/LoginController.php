<?php

namespace App\Http\Controllers;

use DummyFullModelClass;
use App\lain;
use Illuminate\Http\Request; // talvez de conflito e der remover o name espace e deixar apena o use Request
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function form(){
       return view('login');
   }


   public function login(){
    $credencias = Request::only('cpf ' , 'senha');
    /**================================================================= *
     * verifica se o usuario existe e faz login.
     * para apenas verificar e existe pode-se utilizar o Auth::Validate.
     * *================================================================= *
     */
    if (Auth::attempt($credencias)) {
        return 'logado com sucesso';
    }
    return 'usuario nao existe';
    //login
    //retornar
   }


   public function cad(){
       return view('cadastro');
   }
}
