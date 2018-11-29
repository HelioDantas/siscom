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

   function getEspecialidade($espec_id)

   {
       $especialidades = DB::table('sis_especialidade')->select('id','nome')->where('id','!=',$espec_id)->get();
      // dd($especialidades);
      
       
       return json_encode( $especialidades);
   }
  
      public function planoNovo(Request $request, $id){
             
             $dd = Plano::Join('sis_medico_tem_plano', 'sis_plano.id', '=', 'sis_medico_tem_plano.plano_id')->where('medico_id', '=', $id)
             ->where('sis_medico_tem_plano.status', 'ATIVO')->pluck('id');

           $planos = Plano::whereNotIn('id', $dd)->paginate(10);
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

}
