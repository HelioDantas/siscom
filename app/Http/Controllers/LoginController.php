<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(){
       return view('user.login');
   }

   protected $redirectTo = '/';
   public function auth(Request $request)
   {
    $credencias = $request->all('cpf', 'password');
    $user = User::buscar($credencias['cpf']);
  
 
    if ($user == null){

        $mensagem =  "Cpf invalido";
        return redirect('/login')->with("mensagem",  $mensagem);
    }
     if($user->funcionario->status == "A"){

            if (Auth::attempt([
                'cpf' => $request->cpf,
                'password' => $request->password,
            ])) {
                    $user = Auth::user();
                    $id = Auth::id();
                    session()->put('user', $user);

                    return redirect()->route('dashboard');
                 }else{
                    $mensagem =  "Senha Invalida";
                    return redirect('/login')->with("mensagem",  $mensagem);
                 }

        }else{

            $mensagem =  "Usuario não está ativo";
            return redirect('/login')->with("mensagem",  $mensagem);

            }
    

     
   }


   public function cad(){
       return view('cadastro');
   }

   public function logout(){

    Auth::logout();
    return redirect()->route('user.login');
}


protected function redirectTo()
{
    return redirect()->route('dashboard');
}

}
