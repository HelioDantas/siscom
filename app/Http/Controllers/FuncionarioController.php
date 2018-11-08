<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionarioController extends Controller
{
    //
      public function novo(){
        //  form de um novo produto

        return view('funcionario.formulario');
    }

     public function novoM(){
        //  form de um novo produto

        return view('medico.formulario')->with('especi', Especialidade::all());
    }



    public function create(Request $request){

        $Funcionario = Funcionario::create($request->all());
      //  return var_dump($sis_funcionario);
        if($Funcionario->profissao == "A")
            return view('user.novo')->with('func', $Funcionario);
        else
            return view('medico.formulario')->with('arr',['especialidade'=> Especialidade::all(),'func'=> $Funcionario] );


       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);

    }


    public function Medicocreate(Request $request){
       //return var_dump ($request->all());
        $Funcionario = Funcionario::create($request->all());
       // $medico = new Medico();
     
        /* $valor= $request->all('crm');
        $medico->crm = $valor['crm'];
        $medico->Sis_funcionario_matricula = ($Funcionario->id);*/
        $request["Sis_funcionario_matricula"] = $Funcionario->id;
      // return  var_dump($Funcionario->id); 
        $medico = Medico::create($request->all());
        $medico = Medico::find($Funcionario->id);

       // return var_dump($medico);
       $especialidade = $request->only('$especialidade');
      // return  var_dump($medico->Sis_funcionario_matricula);  
     //   $medico->id = ($Funcionario->id);
        foreach ( $especialidade as $e => $id) {
              
              foreach ($id as $key) {
                  
                  $medico->especialidade()->attach($key);
              }
            
        }
       
        
        return view('user.novo')->with('func', $Funcionario);

    }



}
