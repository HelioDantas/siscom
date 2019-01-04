<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RegistroClinico;
class RegistroClinicoController extends Controller
{
    
    function novoRegistro(Request $request)
    {
        
        dd($request);
    }

    function getAjax($paciente_id){
        $r = RegistroClinico::where('paciente_id',58)->get();
       /* dd($r);
        if(isset($r) && !empty($r)){

        foreach($r as $item){
             $rs = array([
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
               // 'DtAgendamento' => $item->agenda()->select(),
            ]);
        }
       
        
    }
    else{
        return JSON_ERROR_NONE;
    }*/

        return json_encode($r);

    }
}
