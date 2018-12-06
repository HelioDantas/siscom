<?php

namespace App\Http\Controllers;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoConvenio;
use Symfony\Component\HttpFoundation\Response;

class ConvenioController extends Controller
{



    function index(){
        $convenios = Convenio::orderBy('nome')->paginate(10);
        return view('convenio.listar' , compact('convenios'));
    }

    function detalhe($id){

        $convenio = Convenio::find($id);

        $planos = $convenio->planos()->where('status','ATIVO')->paginate(5);
        //dd($planos);
        
        $inativos =  $convenio->planos()->where('status','INATIVO')->get();

        return view('convenio.detalhe' , compact('convenio','inativos','planos'));

    }


      public function novo(){
            return view ('convenio.formularioconvenio');
        }

        public function create(Request $request){
            $sis_convenio = Convenio::create($request->all());
          
            return redirect()->action('ConvenioController@index'); 

       }

        public function update(Request $request, $id){
            $convenio = Convenio::find($id);
            $convenio->update($request->all());
                return redirect()->route('convenio.listaconvenio');


        }


        function getPlano($convenio_id)

        {
            $convenio = Convenio::find($convenio_id);
            $planos = $convenio->planos()->get(['id','nome']);
           
            
            return json_encode($planos);
        }

}
