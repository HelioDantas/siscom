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

    }
   

    public function Medicocreate(Request $request){
       //return var_dump ($request->all());
        $Funcionario = Funcionario::create($request->all());
        $medico = new Medico();
     
        $valor= $request->all('crm');
        $medico->crm = $valor['crm'];
        $medico->Sis_funcionario_matricula = ($Funcionario->matricula);
        $medico->save();
        $medico = Medico::find($Funcionario->matricula);
        $especialidade = $request->only('$especialidade');
        if($especialidade != null)
            foreach ($especialidade as $e => $id) {
                foreach ($id as $key) {    
                    $medico->especialidade()->attach($key);
                }    
            }        
                return view('user.novo')->with('func', $Funcionario);

    }

      public function listar(){
      
        $Funcionarios = Funcionario::paginate(5);
        return view('funcionario.listar' , compact('Funcionarios'));
       
      } 

         public function destroy ($id){

        $Funcionario = Funcionario::find($id);
        $Funcionario->delete();
        return redirect()->action('FuncionarioController@listar');




    }

      public function edit( $id) 
    {
        //  form para editar infos de um paciente
       $p = Funcionario::find($id);

        return view('funcionario.editar')->with('p' , $p);
    }

    
    public function update(Request $request, $id)
    {
       

        $Funcionario = Funcionario::find($id);

        $Funcionario->update($request->all());
        return redirect()->route('funcionario.listar');
    }

}
