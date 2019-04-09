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

    private $quantidade;
      public function __construct()
    {

        $this->quantidade = 8;
    }

    public function desativar_plano(Request $request, $id, $plano_id){

        Medico::find($id)->planos()->updateExistingPivot($plano_id, ['status'=>'INATIVO']);
        return back();
   }

   function getEspecialidade($espec_id)
   {
        $especialidades = DB::table('sis_especialidade')->select('id','nome')->where('id','!=',$espec_id)->get();
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

       $dd = Medico::find($medico_id)->planos()->where('plano_id', $id)->get();
       if(sizeof($dd) > 0){
            Medico::find($medico_id)->planos()->updateExistingPivot($id, ['status'=>'ATIVO']);
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

        return json_encode( $especialidades);
    }


    public function agenda(  $date = "five", $espec = ""  ){

        $medicoId = Auth::user()->funcionario->matricula;
        $med = Medico::find($medicoId);
        $userMedico = $med;
        if ($date == "five")
            $date = date("Y-m-d");
        $agendamentos = Agenda::where('idMedico', $medicoId)->where('data', $date)->orderBy('hora')->get();
        $medPlanos = $med->planos()->has('procedimentos')->get();
        $convenios = Convenio::all();
        if(!empty($espec)){
            $esp = Especialidade::find($espec);
            $especialidadesP = $esp->procedimentos()->get();
            $DemaisEspecialidadesDoMedicoSemSerAEscolhida = $med->especialidade()->where('id', '!=', $espec)->get();
        }
        else{
            $especialidade = $med->especialidade()->get();
         }
        return view('agenda.teste', compact('especialidade','medicos','esp','agendamentos','med', 'medicoId', 'date','medPlanos','convenios', 'DemaisEspecialidadesDoMedicoSemSerAEscolhida', 'userMedico'));


    }


    public function atendimento(Request $request,$id = ''){
        if($id !== ""){
        $agenda = Agenda::find($id);
         if($agenda->atendido == 'S')
             return back()->with("metodos", 'Paciente já ate atendido');
        if(AgendaController::VerficarSeAdataEInferiorAtual($agenda->data))
            return redirect()->back()->with("metodos", 'O paciente não pode ser atendido em uma data diferente daquela marcada');
        $paciente =  Paciente::find($agenda->paciente_id);

        }

        return view('medico.atendimento2' , compact('paciente','agenda'));
    }



    function novoRegistro(Request $request)
    {
        $request['medico_id'] = Auth::user()->funcionario->matricula;
        $registro = RegistroClinico::create($request->all());
        $registro->agenda()->update([
            'atendido' => 'S'

        ]);
 
        return redirect()->route('medico.agenda');
    }

    function RegistrosClinicos(){

            $agendamentos = Agenda::has('registro')->orderBy('data', 'desc')->paginate($this->quantidade);
            return view('medico.RegistroClinico' , compact('agendamentos'));
    }


       function BuscarPorRegistrosClinicos(Request $request){

            $tipo = $request['tipobusca'];
            $buscar = $request->input('search');
            switch($tipo){
                case "paciente":
                $agendamentos = Agenda::has('registro')
                ->where($tipo, 'like', '%'.$buscar.'%')->orderBy('data', 'desc')->paginate($this->quantidade);
                break;

                case "cpf":
                $agendamentos = Agenda::has('registro')
                ->where($tipo, 'like', '%'.$buscar.'%')->orderBy('data', 'desc')->paginate($paginate );
                break;

                case "telefone":
                $agendamentos = Agenda::has('registro')->where($tipo, 'like', '%'.$buscar.'%')->orWhere('celular', 'like', '%'.$buscar.'%')->orderBy('data', 'desc')->paginate($this->quantidade);
                break;

                case "data":
                $agendamentos =Agenda::has('registro')->where($tipo, 'like', '%'.$buscar.'%')->orderBy('data', 'desc')->paginate($this->quantidade);
                break;

                case "id":
                $agendamentos = Agenda::has('registro')->where($tipo,'=',$buscar)->orderBy('data', 'desc')->paginate($this->quantidade);

                case "medico":
                $agendamentos = Agenda::has('registro')->where($tipo,'like', '%'.$buscar.'%')->orderBy('data', 'desc')->paginate($this->quantidade);
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
