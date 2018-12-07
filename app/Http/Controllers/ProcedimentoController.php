<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Convenio;

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
        
        $inativos =  $convenio->planos()->where('status','INATIVO')->get();

        return view('procedimento.detalhe' , compact('convenio','procedimentos'));

    }
}
