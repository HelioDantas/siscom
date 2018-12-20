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


    function index( $medicoId  = "", $date = ""){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        //return dd($date);
        $med = Medico::find($medicoId);
        if($med != null){
        //dd($med->planos[0]->procedimentos()->get());
    }
        //Opção com buscar por medico e data 
        $agendamentos = Agenda::where('idMedico', $medicoId)->where('data', $date)->get();

      //Opção para teste
       // $agendamentos = Agenda::where('idMedico',$medicoId)->get();
               // return dd($agendamentos);
     

        return view('agenda.index', compact('especialidade','agendamentos','med', 'medicoId', 'date'));
    }




    function agendar(Request $request){
        dd($request);
            $agenda = Agenda::create($request->all());

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
        $medicos = $espec->Medicos;
        dd($medicos);

        return json_encode( $medicos);

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
