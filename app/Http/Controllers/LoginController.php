<?php

namespace App\Http\Controllers;

use DummyFullModelClass;
use App\lain;
use Request; // talvez de conflito e der remover o name espace e deixar apena o use Request
use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;

class LoginController extends Controller
{
   public function formlogin(){
       return view('login');
   }


   public function login(UserRequest $request){
    $credencias = $request->only('cpf ' , 'senha');
    /**================================================================= *
     * verifica se o usuario existe e faz login.
     * para apenas verificar e existe pode-se utilizar o Auth::Validate.
     * *================================================================= *
     */
    if (Auth::attempt($credencias)) {
        return redirect('/home');//->intended('/home'); // intended retorna o usuario para a tela que ele estava tentando acessar antes de passar pelo middleware
    }
    return 'LoginController@formCad';
   }


   public function cad(){
       return view('cadastro');
   }
}
