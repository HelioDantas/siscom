<?php

namespace App\Http\Controllers;
use App\Models\Medico;
use App\Models\Plano;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especialidade;
use DB;
class MedicoController extends Controller
{
    
   
    public function desativar_plano(Request $request, $id, $plano_id){
        
        Medico::find($id)->planos()->updateExistingPivot($plano_id, ['status'=>'INATIVO']);

        return back();
   }
  
      public function planoNovo(Request $request, $id){
             
             $dd = Plano::Join('sis_medico_tem_plano', 'sis_plano.id', '=', 'sis_medico_tem_plano.plano_id')->where('medico_id', '=', $id)
             ->where('sis_medico_tem_plano.status', 'ATIVO')->pluck('id');

           $planos = Plano::whereNotIn('id', $dd)
           
           
            
           ->paginate(10);
           return view('medico.planos', compact('medico', 'planos'));

   }


    public function planoCreate(Request $request){



   }


}
