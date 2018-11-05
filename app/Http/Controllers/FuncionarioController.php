<?php

namespace App\Http\Controllers;
use App\sis_funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionarioController extends Controller
{
    //
      public function novo() {
        //  form de um novo produto

        return view('funcionario.formulario');
    }


    public function create(){
        
        $sis_funcionario = sis_funcionario::create(Request::all());
        
       return view('user.novo')->with('func', $sis_funcionario); 
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);



    }

}
