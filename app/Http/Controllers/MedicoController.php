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
               $medico = $id;
           return view('medico.planos', compact('medico', 'planos'));

   }


    public function planoCreate(Request $request,  $id, $medico_id){
      //  return dd($request);
     
       $medico =  Medico::find($medico_id);

       if( $medico->planos()->where('plano_id', $id)->get()){
            Medico::find($medico_id)->planos()->updateExistingPivot($id, ['status'=>'ATIVO']);
         //   $medico->planos()->where('plano_id', $id)->update('status', 'ATIVO');
       }else{
            $medico->planos()->attach($id,
            ['status'=>'ATIVO']
            );

         }       
        return redirect()->route('medico.planoNovo', ['id' => $medico]);

    }

}
