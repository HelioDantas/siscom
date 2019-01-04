<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use App\Models\Funcionario;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\plano;
use App\Models\procedimento;
use App\Models\Convenio;
use App\Http\Controllers\PacienteController;
use Illuminate\Http\JsonResponse;
use DB;
class AgendaController extends Controller
{


    function index( $medicoId  = "", $date = "",$espec = ""){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        $medicos = Medico::with('funcionario')->get();
        //return dd($date);
        $med = Medico::find($medicoId);
        if($med != null ){
          //  dd($medPlanos = $med->has('planos.procedimentos')->get());
            $DemaisEspecialidadesDoMedicoSemSerAEscolhida = $med->especialidade()->where('id', '!=', $espec)->get();
            $medPlanos = $med->planos()->has('procedimentos')->get();
        
            $convenios = Convenio::all();
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

   
    // dd($DemaisEspecialidadesDoMedicoSemSerAEscolhida);
        return view('agenda.teste', compact('especialidade','medicos','esp','agendamentos','med', 'medicoId', 'date','medPlanos','convenios', 'DemaisEspecialidadesDoMedicoSemSerAEscolhida'));

    }




    function agendar(Request $request){
        
        
            $dataDaConsulta = strtotime($request['data']);
            $date = strtotime(date("Y-m-d"));
            if( $dataDaConsulta < $date  )
                return back()->with("metodos", 'Não pode ser agendar consultas com data anterior a vigente');;
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
            try{            
              $agenda =  Agenda::create([ 
                    'primeiraVez'      => $primeira ,
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
                    'valor'            => $request['valor'],
                    'plano'            => $request['plano'],





                    ]);
                 
                
            }catch (\Exception $e){

              $mensagem= $e->getMessage();
              $buscar = 'Integrity constraint violation: 1062 Duplicate entry';
               $pos = strpos( $mensagem, $buscar );

             

                if ($pos == true) 
                    return back()->with("metodos", 'Já há agendamento para esse horario');
               
            }
        

            return back();


    }

    public function update(Request $request){

        
 
        $agenda = Agenda::find($request['Salvar']);
         $dataDaConsulta = strtotime($agenda->data);
        $date = strtotime(date("Y-m-d"));
            if( $dataDaConsulta < $date  )
                return back()->with("metodos", 'Não pode ser alterar consultas com data anterior a vigente');;
     
             
          try{  
                 $agenda = $agenda->update(
                     [
                       'hora'             => $request['hora'],
                     'compareceu'             => $request['compareceu'],
                        'pago'             => $request['pago'],
                        'obs'             => $request['obs'],

                     ]);
                     
                    if( DB::table('sis_paciente_tem_plano')->where('paciente_id' ,$request['paciente_id'] )->exists()){
                        DB::table('sis_paciente_tem_plano')->where('paciente_id' ,$request['paciente_id'] )->update(['plano' => $request['plano'] ]);
                        Paciente::updatePlano($request['paciente_id'] , $request['plano']);
                      
                    }else{
                        DB::table('sis_paciente_tem_plano')->insert(['paciente_id'=>$request['paciente_id'] , "plano" =>  $request['plano']]);
                        
                    }
                 //dd($request['obs']);
            }catch (\Exception $e){

              $mensagem= $e->getMessage();
              $buscar = ' Integrity constraint violation: 1062 Duplicate entry';
               $pos = strpos( $mensagem, $buscar );

                if ($pos == true) 
                    return back()->with("metodos", 'Já há agendamento para esse horario');
               
            }
             
             return back();

    }
    
    function destroy(Request $request){
     //   return dd($request);

        $id = $request['id'];
           //  return dd($id);
            $agenda = Agenda::find($id);

            $dataDaConsulta = strtotime($agenda->data);
            $date = strtotime(date("Y-m-d"));
            if( $dataDaConsulta >= $date  ){
                $this->excluirPacientePrimeiraVez($agenda);
                 $agenda->delete();
                 return back();
            }
               

            

            return back()->with("metodos", 'Não é possivel excluir um agendamento anterior a data atual');


    }

        function desmarcar(Request $request){
     //   return dd($request);

        $id = $request['id'];
           
            $agenda = Agenda::find($id);
        
            $dataDaConsulta = strtotime($agenda->data);
            $date = strtotime(date("Y-m-d"));


            if( $dataDaConsulta >= $date  ){
                $this->excluirPacientePrimeiraVez($agenda);
                $agenda = $agenda->update([
                    'compareceu' => 'S' ,
                     'obs' => $request['obs'], 
                    
                ]);
             return back();
            }
            return back()->with("metodos", 'Não é possivel excluir um agendamento anterior a data atual');


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

    function getMedicosProced($id){
        $plano = Plano::find($id);
        $procedimentos = $plano->procedimentos()->get();
        
        if($procedimentos != null)
        return json_encode($procedimentos);
        else
        return json_encode([]);
    }

    function getMedicosProcedPreco($id,$plano){
        $plano = Plano::find($plano);
        $value = $plano->procedimentos()->where('procedimento_id',$id)->first();
        if($value !== null)
        return json_encode($value->pivot->precoPlano);
        else
        return json_encode([]);
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

    public function editarPaciente($id){

        session(['key' => url()->previous()]);
     
       // $request->session()->keep(['username', 'email']);

        return redirect()->route('paciente.editar',['id' => $id]);
    }


    public function historico($id){

         $agendamentos = Agenda::where('paciente_id', $id)->orderBy('data', 'desc')->get();

         return json_encode($agendamentos);

    }


    public function excluirPacientePrimeiraVez($agenda){

        if($agenda->primeiraVez == 'S'){
            $paciente = Paciente::find($agenda->paciente_id);
            $paciente->delete();


        }
    }

    function getAgendamentos($id){
        $agendamentos = Agenda::where('id',$id)->first();
    
        $plano = Plano::where('id',$agendamentos->plano)->first();
     
        $data  = array([
             'planoID'      => $agendamentos->plano,
             'planoNome'    => $plano->nome,
             'primeiraVez'  => $agendamentos->primeiraVez,
             'hora'         => $agendamentos->hora,
             'compareceu'   => $agendamentos->compareceu,
             'pago'         => $agendamentos->pago,
             'obs'          => $agendamentos->obs,
        ]);
        return json_encode($data);

    }
}
