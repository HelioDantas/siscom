<?php

namespace App\Http\Controllers;

use DummyFullModelClass;
use App\lain;
use Request; // talvez de conflito e der remover o name espace e deixar apena o use Request
use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
   public function login(){
       return view('user.login2');
   }


   public function fazerlogin(){ //UserRequest $request
    $credencias = Request::only('cpf ' , 'senha');
    /**================================================================= *
     * verifica se o usuario existe e faz login.
     * para apenas verificar e existe pode-se utilizar o Auth::Validate.
     * *================================================================= *
     */
    if (Auth::check($credencias)) {
        return redirect('/dashboard')->intended('dashboard'); // intended retorna o usuario para a tela que ele estava tentando acessar antes de passar pelo middleware
    }
    return 'LoginController@login';
   }


   function logout(){
       return Redirect('LoginController@login');
   }
}
