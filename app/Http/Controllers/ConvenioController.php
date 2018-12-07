<?php

namespace App\Http\Controllers;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoConvenio;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ConvenioRequest;


class ConvenioController extends Controller
{



    function index(){
        $convenios = Convenio::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('convenio.listar' , compact('convenios'));
    }

    function detalhe($id){

        $convenio = Convenio::find($id);

        $planos = $convenio->planos()->where('status','ATIVO')->paginate(5);
        //dd($planos);
        
        $inativos =  $convenio->planos()->where('status','INATIVO')->get();

        return view('convenio.detalhe' , compact('convenio','inativos','planos'));

    }

        function editar($id){

        $convenio = Convenio::find($id);

    

        return view('convenio.editar' , compact('convenio'));

        }
    


      public function novo(){
            return view ('convenio.novo');
        }

        public function create(ConvenioRequest $request){
            $sis_convenio = Convenio::create($request->all());
          
            return redirect()->action('ConvenioController@index'); 

       }

        public function update(ConvenioRequest $request, $id){
            $convenio = Convenio::find($id);
            $convenio->update($request->all());
                return redirect()->route('convenio.listar');


        }


        function getPlano($convenio_id)

        {
            $convenio = Convenio::find($convenio_id);
            $planos = $convenio->planos()->get(['id','nome']);
           
            
            return json_encode($planos);
        }

}
