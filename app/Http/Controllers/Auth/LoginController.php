<?php

namespace App\Http\Controllers;
use Validator;
use DummyFullModelClass;
use App\lain;
use Illuminate\Http\Request; // talvez de conflito e der remover o name espace e deixar apena o use Request
//use Auth;
use App\Models\User;
use UserRequest;

class LoginController extends Controller
{
   public function formlogin(){
       return view('user.login');
   }


   public function login(Request $request){

     $credencias = $request->all('cpf', 'password');
    $user = User::buscar($credencias['cpf']);
   if($user->senha == $credencias['password']){
        $request->session()->put('user', $user->nome);
        return view("layout.app");
     } else {
         return view('user.login');



   }

    /**================================================================= *
     * verifica se o usuario existe e faz login.
     * para apenas verificar e existe pode-se utilizar o Auth::Validate.
     * *================================================================= *
     */
    /*if (Auth::attempt($credencias)) {
        return redirect('/home');//->intended('/home'); // intended retorna o usuario para a tela que ele estava tentando acessar antes de passar pelo middleware
    }
    return 'LoginController@formCad';*/
   }


   public function cad(){
       return view('cadastro');
   }

    public function logout(Request $request){

        $request->session()->forget('user');
        return redirect()->action("LoginController@formLogin");

   }







}
