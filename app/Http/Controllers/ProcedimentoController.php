<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plano;
use Illuminate\Support\Facades\DB;
use App\Models\procedimento;
use App\Models\Especialidade;

class ProcedimentoController extends Controller
{
    function detalhe($id){

        $convenio = Convenio::find($id);
      
         dd($plano = $convenio->planos()->first());
         $procedimentos = $plano->procedimentos()->get();

         //dd($procedimentos);
        /*foreach ($convenio->planos()->get() as $plano) {
            $procedimentos[] = $plano->procedimentos()->get();
        }

        dd($procedimentos);*/
       // DB::table('')
        

        //$planos = $convenio->planos()->where('status','ATIVO')->paginate(5);
        //dd($planos);
        
        $inativos =  $plano->pivot->where('status','INATIVO')->get();
       

        return view('procedimento.detalhe' , compact('convenio','procedimentos','inativos'));

    }

    function novo($id){
       $plano = Plano::find($id);
        $especialidades = Especialidade::all();
       return view('procedimento.detalhe' , compact('plano','especialidades'));

    }

    function assocDelete($plano_id,$proced_id){
        //  Plano::find($id)->update(['status'=> 'INATIVO']);
  
       //return dd(  $plano->update(['status' => 'INATIVO']));
          DB::table('sis_plano_procedimento')->where('plano_id',$plano_id)->where('procedimento_id',$proced_id)->update(['status'=> 'INATIVO']);
          
          return redirect()->action('ProcedimentoController@novo', ['id' => $plano_id]);
      }


      function planoAssoc(Request $request){
          
          
        if($request['inativo'] == null){
dd($request);
            $proced = procedimento::create([
            'especialidade_id' => $request['especialidade_id'],
            'codTuss' =>  $request['ProcedCodTuss'],
            'descricao' =>  $request['nomeProced'],
            'preco' =>  $request['ProcedPreco'],
            ] );
            DB::insert('insert into sis_plano_procedimento (plano_id , procedimento_id,descricao,precoPlano ) values (?, ?,?,?)',
             [$request['plano_id'], $proced->codTuss ,$proced->descricao, $request['ProcedPreco']]);
                return redirect()->back();
           

        }else if($request['inativo'] !== null){
          
            DB::table('sis_plano_procedimento')->where('procedimento_id',$request['inativo'])->update(['status'=> 'ATIVO']);
            return redirect()->back();

        }

        return redirect()->back();

      }

     
  

}
