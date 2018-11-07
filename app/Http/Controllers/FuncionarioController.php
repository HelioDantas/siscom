<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionarioController extends Controller
{
    //
      public function novo() {
        //  form de um novo produto

        return view('funcionario.formulario');
    }


    public function create(Request $request){
        
        $Funcionario = Funcionario::create($request->all());
      //  return var_dump($sis_funcionario);
        if($Funcionario->profissao == "A")
            return view('user.novo')->with('func', $Funcionario);
        return view('layout.app'); 
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);



    }


    




}
