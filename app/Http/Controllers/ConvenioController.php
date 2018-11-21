<?php

namespace App\Http\Controllers;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoConvenio;
use Symfony\Component\HttpFoundation\Response;

class ConvenioController extends Controller
{
      public function novo(){
            return view ('convenio.formularioconvenio');
        }

        public function create(Request $request){
            $sis_convenio = Convenio::create($request->all());
          
            return view('layout.app'); 

       }

        public function update(Request $request, $id){
            $convenio = Convenio::find($id);
            $convenio->update($request->all());
                return redirect()->route('convenio.listaconvenio');


        }

        function getTipoConvenio($convenio_id)
        {
            $convenio = Convenio::find($convenio_id);
            $planos = $convenio->planos()->getQuery()->get(['id','nome']);
            
            return Response::json($planos);
        }

}
