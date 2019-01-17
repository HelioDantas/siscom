<?php

namespace App\Http\Controllers;
use App\Models\ProcedimentoClinico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proceds;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ProcedimentoClinicoRequest;


class ProcedimentoClinicoController extends Controller
{

    function index(){
        $procedcli = Proceds::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('procedimentoClinico.listar' , compact('procedimentoClinico'));
    }

        function editar($id){

        $procedcli = ProcedimentoClinico::find($id);

    

        return view('procedimentoClinico.editar' , compact('procedimentoClinico'));

        }
    
      public function novo(){
            return view ('procedimentoClinico.novo');
        }

        public function create(ProcedimentoClinicoRequest $request){
            $sis_proced_clinico = ProcedimentoClinico::create($request->all());
          
            return redirect()->action('procedimentoClinicoController@index'); 

       }

        public function update(ProcedimentoClinicoRequest $request, $id){
            $procedcli = ProcedimentoClinico::find($id);
            $procedcli->update($request->all());
                return redirect()->route('procedimentoClinico.listar');


        }
}
