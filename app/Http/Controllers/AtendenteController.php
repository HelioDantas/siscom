<?php

namespace App\Http\Controllers;
use App\sis_funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AtendenteController extends Controller
{
    //
      public function novo() {
        //  form de um novo produto

        return view('Atendente.formulario');
    }


    public function create(){
        
        $sis_funcionario = sis_funcionario::create(Request::all());
        
        return view('user.cadastrar')->whih('func', $sis_funcionario); 




    }

}
