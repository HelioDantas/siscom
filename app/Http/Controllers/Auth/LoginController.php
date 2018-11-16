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
    $mensagem;
    $credencias = $request->all('cpf', 'password');
    $user = User::buscar($credencias['cpf']);
    if ($user == null){
        $mensagem =  "Cpf invalido";
        return view('user.login')->with("mensagem",  $mensagem);
    }
    $user = User::find($user->id);
   // return dd($user);

    if ($user == null){

        $mensagem =  "Cpf invalido";
        return view('user.login')->with("mensagem",  $mensagem);
    }
     if($user->funcionario->status == "A"){ 

        if(password_verify($credencias['password'], $user->senha)){
            $request->session()->put('user', $user->funcionario->nome);
            return view("layout.app");
        }else{
            $mensagem =  "Senha Invalida";
            return view('user.login')->with("mensagem",  $mensagem);

        }

        }else{

            $mensagem =  "Usuario não está ativo";
            return view('user.login')->with("mensagem",  $mensagem);
        
        }



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
   


   public function cad(){
       return view('cadastro');
   }

    public function logout(Request $request){

        $request->session()->forget('user');
        return redirect()->action("LoginController@formLogin");

   }







}
