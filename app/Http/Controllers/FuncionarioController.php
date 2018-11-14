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

        return view('funcionario.formulario')->with('especi', Especialidade::all());;
    }

     public function novoM(){
        //  form de um novo produto

        return view('medico.formulario')->with('especi', Especialidade::all());
    }



    public function create(Request $request){
        $Funcionario = Funcionario::create($request->all());
      //  return var_dump($sis_funcionario);
        if($Funcionario->profissao == "A"){
            return view('user.novo')->with('func', $Funcionario);

        }else{
           
         if($Funcionario->profissao == "M"){
            $medico = new Medico();
            $valor= $request->all('crm');
            $medico->crm = $valor['crm'];
            $medico->Sis_funcionario_matricula = $Funcionario->matricula;
            $medico->save();
            $medico = Medico::find($Funcionario->matricula);
            $especialidade1 = $request->only('especialidade1');
            $especialidade2 = $request->only('especialidade2');
            $medico->especialidade()->attach($especialidade2);
            $medico->especialidade()->attach($especialidade1);

          return view('user.novo')->with('func', $Funcionario);
         }      
        }  
    }
   

    public function Medicocreate(Request $request , $id){
        
        return dd($request->all());
        $medico = new Medico();
     
      return dd(  $valor= $request->all('crm', 'matricula'));
        $medico->crm = $valor['crm'];
        $medico->Sis_funcionario_matricula =$valor['matricula'];
        $medico->save();
        $medico = Medico::find($Funcionario->matricula);
        $especialidade1 = $request->only('especialidade1');
        $especialidade2 = $request->only('especialidade2');
        $medico->especialidade()->attach($especialidade2);
        $medico->especialidade()->attach($especialidade1);

        return view('user.novo')->with('func', $Funcionario);

    }

      public function listar(){
      
        $Funcionarios = Funcionario::paginate(5);
        return view('funcionario.listar' , compact('Funcionarios'));
       
      } 


       public function buscar(Request $request){
        $buscar = $request->input('search');
        $Funcionarios = Funcionario::where('nome', 'like', '%'.$buscar.'%')
        ->orWhere('cpf', 'like', '%'.$buscar.'%')
        ->orWhere('matricula', 'like', '%'.$buscar.'%')
        ->paginate(5);
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
