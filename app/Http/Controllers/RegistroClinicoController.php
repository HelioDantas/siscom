<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\RegistroClinico;
use Symfony\Component\Console\Tests\Descriptor\JsonDescriptorTest;
use Illuminate\Support\Facades\Auth;
class RegistroClinicoController extends Controller

{
    
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

    function getAjax($paciente_id){
        $r = RegistroClinico::where('paciente_id',$paciente_id)->get();
        if(isset($r) && !empty($r)){
       
/*
        function getDataAgenda($dataAgendamento,$paciente_id){
                return Agenda::select('data')->where('data',$dataAgendamento)->where('paciente_id',$paciente_id);
        }

        if(isset($r) && !empty($r)){

        foreach($r as $item){
            $rs =  array(
                'associativeArray' => array(
                    [
                        'queixaPrincipal' => $item->queixaPrincipal,
                        'historia'  => $item->historia,
                        'tempo_atendimento' => $item->tempo_atendimento,
                        'prognostico'=> $item->prognostico,
                        'medicamento'=> $item->medicamento,
                        'observacoes' => $item->observacoes,
                        'orientacao'=> $item->orientacao,
                        'problemas' => $item->problemas,
                        'historia'  => $item->historia,
                        'historicoFamiliar' => $item->historicoFamiliar,
                        'obsPessoal' => $item->obsPessoal,
                       'DtAgendamento' => getDataAgenda($item->dataAgendamento,$item->paciente_id),
                    ]
                )
            );
              
        }
     
        
    }
    else{
        return JSON_ERROR_NONE;
    } */

        return json_encode($r);
        }
        else{
            return json_encode("Nao há registros para esse Paciente");;
        }
    }
}
