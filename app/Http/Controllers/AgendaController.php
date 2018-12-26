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
        $medicos = Medico::all();
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
        return view('agenda.teste', compact('especialidade','medicos','esp','agendamentos','med', 'medicoId', 'date','especialidadesP'));

    }




    function agendar(Request $request){
        
            isset($request['primeiraVez']) ? $primeira = $request['primeiraVez'] : $primeira = "N";

            $paciente = Paciente::where('cpf',$request['cpf'])->where('nome',$request['paciente'])->first();
            if($paciente === null){
                $paciente = Paciente::create([

                   'nome'             => $request['paciente'],
                   'cpf'              => $request['cpf'],
                   'dataDeNascimento' => $request['dataDeNascimento'],
                   'telefone'         => $request['telefone'],
                   'celular'          => $request['celular'],
                   
                ]);
                
                $primeira = "S";
            }

             Agenda::create([ 
                 'primeiraVez'      => $primeira,
                 'paciente_id'      => $paciente->id, 
                 'paciente'         => $request['paciente'],
                 'cpf'              => $request['cpf'],
                 'dataDeNascimento' => $request['dataDeNascimento'],
                 'telefone'         => $request['telefone'],
                 'celular'          => $request['celular'],
                 'procedimento_id'  => $request['procedimento_id'],
                 'medico'           => $request['medico'],
                 'idMedico'         => $request['idMedico'],
                 'atendente'        => $request['atendente'],
                 'hora'             => $request['hora'],
                 'data'             => $request['data'],


                 ]);

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


    function getMedicosEsp($id){
       $medico = Medico::find($id);
        $esps = $medico->especialidade()->get(); 
        return json_encode($esps);

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
