<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function novo(Request $request){
      if ($request->is('funcionario/create')) {
           return view('user.novo');

        }
        else
        return '<h1>Acesso indevido </h1>';

    }


      public function create(Request $request){

        $request['senha'] = password_hash($request['senha'],1);
        
        $User = User::Create($request->all());
     //   return var_dump($sis_funcionario);
        
       return redirect()->route('funcionario.listar')->withInput();
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);



      }

      public function recoveryForm(){
        
        return view('user.recovery');
      }

      public function recovery(Request $request){

        $user = User::buscar($request['email']);
        if (isset($user)) {
          // gerar nova senha , inserir no db e enviar nova senha para o usuario.



        }else{
          return redirect()->back();
        }
      }



}
