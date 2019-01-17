<?php

namespace App\Http\Controllers;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Labs;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\LaboratorioRequest;


class LaboratorioController extends Controller
{

    function index(){
        $laboratorio = Labs::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('laboratorio.listar' , compact('laboratorio'));
    }

        function editar($id){

        $laboratorio = Laboratorio::find($id);

    

        return view('laboratorio.editar' , compact('laboratorio'));

        }
    
      public function novo(){
            return view ('laboratorio.novo');
        }

        public function create(LaboratorioRequest $request){
            $sis_laboratorio = Laboratorio::create($request->all());
          
            return redirect()->action('LaboratorioController@index'); 

       }

        public function update(LaboratorioRequest $request, $id){
            $laboratorio = Laboratorio::find($id);
            $laboratorio->update($request->all());
                return redirect()->route('laboratorio.listar');


        }
}
