<?php

namespace App\Http\Controllers;
use App\Models\Procedimentoclinico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proceds;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ProcedimentoclinicoRequest;


class ProcedimentoclinicoController extends Controller
{

    function index(){
        $procedimentoclinico = Proceds::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('procedimentoclinico.listar' , compact('procedimentoclinico'));
    }

        function editar($id){

        $procedimentoclinico = Procedimentoclinico::find($id);

    

        return view('procedimentoclinico.editar' , compact('procedimentoclinico'));

        }
    
      public function novo(){
            return view ('procedimentoclinico.novo');
        }

        public function create(ProcedimentoclinicoRequest $request){
            $sis_proced_clinico = Procedimentoclinico::create($request->all());
          
            return redirect()->action('procedimentoclinicoController@index'); 

       }

        public function update(ProcedimentoclinicoRequest $request, $id){
            $procedimentoclinico = Procedimentoclinico::find($id);
            $procedimentoclinico->update($request->all());
                return redirect()->route('procedimentoclinico.listar');

        }

       
}