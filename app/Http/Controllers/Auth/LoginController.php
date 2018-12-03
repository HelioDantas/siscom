<?php
use Illuminate\Support\Facades\Auth;
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
   public function formlogin(Request $request){
       if($request->session()->exists('user'))
            return redirect()->route('dashboard');
       return view('user.login');
   }


   public function login(Request $request){
    $mensagem;
    $credencias = $request->all('cpf', 'password');
    $user = User::buscar($credencias['cpf']);
    if ($user == null){
        $mensagem =  "Cpf invalido";
        return redirect('/login')->with("mensagem",  $mensagem);
    }
    $user = User::find($user->id);
   // return dd($user);

    if ($user == null){

        $mensagem =  "Cpf invalido";
        return redirect('/login')->with("mensagem",  $mensagem);
    }
     if($user->funcionario->status == "A"){

        if(password_verify($credencias['password'], $user->senha)){
            $request->session()->put('user', $user);
            $request->session()->put('permissao', $user->permission()->get());
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

        $request->session()->flush();
        return redirect()->action("LoginController@formLogin");

   }



   public function username()
   {
       return 'cpf';
   }




   public function authenticate(Request $request)
   {
       $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
           // Authentication passed...
           return redirect()->intended('dashboard');
       }
   }


}
