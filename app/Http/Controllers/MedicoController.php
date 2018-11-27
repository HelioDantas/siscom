<?php

namespace App\Http\Controllers;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Especialidade;
class MedicoController extends Controller
{
    
   
    public function desativar_plano(Request $request, $id, $plano_id){
        
        Medico::find($id)->planos()->updateExistingPivot($plano_id, ['status'=>'INATIVO']);

        return back();
   }



}
