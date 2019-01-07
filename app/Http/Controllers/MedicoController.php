<?php

namespace App\Http\Controllers;
use App\Models\Medico;
use App\Models\Plano;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especialidade;
use DB;
use App\Models\Agenda;
use App\Models\Paciente;
use Auth;
use App\Models\RegistroClinico;
use App\Models\procedimento;
use App\Models\Convenio;
use App\Http\Controllers\AgendaController;
class MedicoController extends Controller
{


   
    public function desativar_plano(Request $request, $id, $plano_id){

        Medico::find($id)->planos()->updateExistingPivot($plano_id, ['status'=>'INATIVO']);

        return back();
   }

   function getEspecialidade($espec_id)

   {
       $especialidades = DB::table('sis_especialidade')->select('id','nome')->where('id','!=',$espec_id)->get();
      // dd($especialidades);


       return json_encode( $especialidades);
   }

      public function planoNovo(Request $request, $id){

             $dd = Plano::Join('sis_medico_tem_plano', 'sis_plano.id', '=', 'sis_medico_tem_plano.plano_id')->where('medico_id', '=', $id)
             ->where('sis_medico_tem_plano.status', 'ATIVO')->pluck('id');

           $planos = Plano::whereNotIn('id', $dd)->paginate(6);
               $medico = $id;
           return view('medico.planos', compact('medico', 'planos'));

         }


    public function planoCreate(Request $request,  $id, $medico_id){
      //  return dd($request);




       $dd = Medico::find($medico_id)->planos()->where('plano_id', $id)->get();
       if(sizeof($dd) > 0){
            Medico::find($medico_id)->planos()->updateExistingPivot($id, ['status'=>'ATIVO']);
         //   $medico->planos()->where('plano_id', $id)->update('status', 'ATIVO');
       }else{

             Medico::find($medico_id)->planos()->attach($id,
                ['status'=>'ATIVO']
                );


         }
        return redirect()->route('medico.planoNovo', ['id' => $medico_id]);

    }

    function getHorarios($medicoId){
    $medico = Medico::find($medicoId);
    $medico = $medico->getHorarios();
  ///  dd($medico);
    return json_encode( $especialidades);
    }


    public function agenda(  $date = "five", $espec = ""  ){

       // $especialidade = Especialidade::with('Medico.funcionario')->get();
 
        //return dd($date);
        $medicoId = Auth::user()->funcionario->matricula;
        $med = Medico::find($medicoId);
        $userMedico = $med;

        if ($date == "five")
            $date = date("Y-m-d");
        $agendamentos = Agenda::where('idMedico', $medicoId)->where('data', $date)->orderBy('hora')->get();

       // $esp = Especialidade::with('Medico.funcionario')->get();
      
    
      
       
          //  dd($medPlanos = $med->has('planos.procedimentos')->get());
           
            $medPlanos = $med->planos()->has('procedimentos')->get();
        
            $convenios = Convenio::all();
      //Opção para teste
       // $agendamentos = Agenda::where('idMedico',$medicoId)->get();
               // return dd($agendamentos);


  //dd($esp);
     if(!empty($espec)){
         $esp = Especialidade::find($espec);

         
         $especialidadesP = $esp->procedimentos()->get();
        $DemaisEspecialidadesDoMedicoSemSerAEscolhida = $med->especialidade()->where('id', '!=', $espec)->get();
         //dd($especialidadesP);
        
     }
     else{

           $especialidade = $med->especialidade()->get();
           //dd($especialidade);
     }
  //$especialidade = $med->especialidade()->get();

   

        return view('agenda.teste', compact('especialidade','medicos','esp','agendamentos','med', 'medicoId', 'date','medPlanos','convenios', 'DemaisEspecialidadesDoMedicoSemSerAEscolhida', 'userMedico'));




    }


    public function atendimento(Request $request,$id = ''){
        if($id !== ""){
        $agenda = Agenda::find($id);
        // if($agenda->atendido == 'S')
          //  return back()->with("metodos", 'Paciente já ate atendido');
        $paciente =  Paciente::find($agenda->paciente_id);

       
        }

        return view('medico.atendimento' , compact('paciente','agenda'));
    }


    
    function novoRegistro(Request $request)
    {
        $request['medico_id'] = Auth::user()->funcionario->matricula;
        $registro = RegistroClinico::create($request->all());
        $registro->agenda()->update([
            'atendido' => 'S'
            
        ]);
        // $agenda = Agenda::find($id);

        return redirect()->route('medico.agenda');
    }

    function RegistrosClinicos(){



            return view('medico.RegistroClinico' );
    }


       function BuscarPorRegistrosClinicos(Request $request){
         

            $tipo = $request['tipobusca'];
            $buscar = $request->input('search');

              


            switch($tipo){
                case "paciente":
                

                $agendamentos = Agenda::has('registro')
               
                ->where($tipo, 'like', '%'.$buscar.'%')->paginate(4);
                break;

                case "cpf":
                $agendamentos = Agenda::has('registro')
                ->where($tipo, 'like', '%'.$buscar.'%')->paginate(4);
                break;

                case "telefone":
                $agendamentos = Agenda::has('registro')->where($tipo, 'like', '%'.$buscar.'%')->orWhere('celular', 'like', '%'.$buscar.'%')->paginate(4);
                break;

                case "data":
                $agendamentos =Agenda::has('registro')->where($tipo, 'like', '%'.$buscar.'%')->paginate(4);
                break;

                case "id":
                $agendamentos = Agenda::has('registro')->where($tipo,'=',$buscar)->paginate(4);

                case "medico":
                $agendamentos = Agenda::has('registro')->where($tipo,'like', '%'.$buscar.'%')->paginate(4);
                break;

            }



            return view('medico.RegistroClinico' , compact('agendamentos'))->with('tipobusca', $tipo)
            ->with('search', $buscar);
    }

     function getRegistros($id){
        $registros = RegistroClinico::where('agenda_id',$id)->first();
    
        return json_encode($registros);

    }

}
