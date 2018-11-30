<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Medico;
use App\Models\Especialidade;
use App\Models\Plano;
use App\Http\Requests\FuncionarioRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use DB;
class FuncionarioController extends Controller
{
    //
 

      public function novo(Request $request){
        //  form de um novo produto
        PermissionController::novo( $request);
        $especi = Especialidade::all();
       
        $planos =  Plano::where('status', 'ATIVO')->get();
        return view('funcionario.formulario', compact('especi','planos'  ));
    }





    public function create(FuncionarioRequest $request){

          PermissionController::create( $request);
        $Funcionario = Funcionario::create([
            'nome'              =>  mb_strtolower($request['nome']),
            'nacionalidade'     =>  mb_strtolower($request['nacionalidade']),
            'naturalidade'      =>  mb_strtolower($request['naturalidade']),
            'rua'               =>  mb_strtolower($request['rua']),
            'bairro'            =>  mb_strtolower($request['bairro']),
            'cidade'            =>  mb_strtolower($request['cidade']),
            'email'             =>  mb_strtolower($request['email']),
            'estado'            =>  mb_strtolower($request['estado']),
            'matricula'         => $request['matricula'],
            'cpf'               => $request['cpf'],
            'sexo'              => $request['sexo'],
            'etnia'             => $request['etnia'],
            'identidade'        => $request['identidade'],
            'dataDeNascimento'  => $request['dataDeNascimento'],
            'escolaridade'      => $request['escolaridade'],
            'celular'           => $request['celular'],
            'profissao'         => $request['profissao'],
            'telefone'          => $request['telefone'],
            'cep'               => $request['cep'],
            ]);
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
            $planos = $request->only('$p');
            foreach( $planos as $id){
            $medico->planos()->attach($id);

            }
          return view('user.novo')->with('func', $Funcionario);
         }
        }
    }




      public function listar(){

        $Funcionarios = Funcionario::paginate(5);
        return view('funcionario.listar' , compact('Funcionarios'));

      }


       public function buscar(Request $request){
        $tipo = $request['tipobusca'];
        $buscar = $request->input('search'); 
         if($tipo == null){
               $funcionarios = Funcionario::where('nome', 'like', '%'.$buscar.'%')
                ->orWhere('cpf', 'like', '%'.$buscar.'%')
                ->orWhere('matricula', 'like', '%'.$buscar.'%')
                ->paginate(10);
             


        }else{
             $funcionarios = Funcionario::where($tipo, 'like', '%'.$buscar.'%')->paginate(10);
    

        } 
        
        return view('funcionario.listar' , compact('funcionarios'));

      }


        public function buscarCpf(Request $request,  $buscar){
        $Funcionarios = Funcionario::where('cpf', '=', $buscar);
        return view('funcionario.formulario' , compact('Funcionarios'));

      }



         public function destroy (Request $request, $id){
        PermissionController::destroy( $request);
        $Funcionario = Funcionario::find($id);
        $Funcionario->delete();
        return back();




    }

      public function edit(Request $request,  $id)
    {
        //  form para editar infos de um funcionario
         PermissionController::edit( $request);
         $p = Funcionario::find($id);
           
        $m = DB::table('sis_medico_tem_especialidade')->where('sis_medico_funcionario_matricula',$p->matricula)->get();


        foreach ($m as $m->Sis_especialidade_id => $espec) {
            $tt = $espec->Sis_especialidade_id;
           $s[] = Especialidade::find($tt);
          
        }

       $especialidades = Especialidade::all();
      
        //dd($m);
        return view('funcionario.editar', compact('p','s','especialidades'));
    }


    public function update(FuncionarioRequest $request, $id)
    {

        PermissionController::update( $request);

        $Funcionario = Funcionario::find($id);

        $Funcionario->update($request->all());
        return redirect()->route('funcionario.listar');
    }

        public function show(Request $request, $id)
    {
        //  form para editar infos de um paciente
        PermissionController::show( $request);
         $p = Funcionario::find($id);


        return view('funcionario.show')->with('p' , $p);
    }

}
