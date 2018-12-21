<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use App\Models\Funcionario;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\JsonResponse;
class AgendaController extends Controller
{


    function index( $medicoId  = "", $date = "",$espec = ""){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        //return dd($date);
        $med = Medico::find($medicoId);
        if($med != null){
        //dd($med->planos[0]->procedimentos()->get());
    }
        //Opção com buscar por medico e data 
        $agendamentos = Agenda::where('idMedico', $medicoId)->where('data', $date)->orderBy('hora')->get();

      //Opção para teste
       // $agendamentos = Agenda::where('idMedico',$medicoId)->get();
               // return dd($agendamentos);

     if(!empty($espec)){
         $esp = Especialidade::find($espec);
         $especialidadesP = $esp->procedimentos()->get();
         //dd($especialidadesP);
        
     }
        return view('agenda.teste', compact('especialidade','esp','agendamentos','med', 'medicoId', 'date','especialidadesP'));

    }




    function agendar(Request $request){
        if(isset($request['primeiraVez'])){
            $primeiraVez = "S";
        }
           $agenda = Agenda::create($request->all(),
           ['primeiraVez' => $request['primeiraVez']] );



            $CadParcialPaciente = Paciente::where('cpf',$request['cpf'])->where('nome',$request['paciente'])->first();
            if($CadParcialPaciente === null){
                Paciente::ceate([
                   'nome'             => $request['paciente'],
                   'cpf'              => $request['cpf'],
                   'dataDeNascimento' => $request['dataDeNascimento'],
                   'telefone'         => $request['telefone'],
                   'celular'          => $request['celular'],
                   
                ]);
            }
         

            return back();


    }

    
    function desmarcar(Request $request){
     //   return dd($request);
        $id = $request['id'];
           //  return dd($id);
            $agenda = Agenda::find($id);
            $agenda->delete();

            return back();


    }


    function remarcar(Request $request , $id){

        $this->desmarcar($id);
        $this->remarcar($request, $id);

        return back();


    }


    function getMedicos($id){
        $espec = Especialidade::find($id);
        $medicos = $espec->Medico()->get();
        $tt=[];
        foreach ($medicos as $m) {
        $tt [] = ["id" => $m->funcionario->matricula, "nome" => $m->funcionario->nome]; 
        }
        return json_encode($tt);

    }


     function buscarName( Request $request){
         $term = $request['term'];
      $nome = Paciente::where('nome', 'like', '%'.$term.'%')->pluck('nome');
       return json_encode($nome);

  

    }

 function buscarCpf( Request $request){
         $term = $request['term'];
      $cpf = Paciente::where('cpf', 'like', '%'.$term.'%')->pluck('cpf');
       return json_encode($cpf);

  

    }


}
