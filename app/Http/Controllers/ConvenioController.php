<?php

namespace App\Http\Controllers;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ConvenioController extends Controller
{
    private $convenio;
    private $totalPage=10;

      public function novo(){
            return view ('convenio.formularioconvenio');
        }

        public function create(Request $request){
            $sis_convenio = Convenio::create($request->all());
            return view('layout.app'); 

       }
        /*
        public function edit(){
            return view('layout.app');

       }
        public function update (Request $request, $id){
            $convenio = Convenio::find($id);
            $convenio->update($request->all());
                return redirect()->route('convenio.editar');

        }*/
        public function listaconvenio(){
            $convenio = DB::select ('select * from formularioconvenio');
            return view('listaconvenio')->with('formularioconvenio', $formularioconvenio); }

        public function paginacao()
        {
           $paginacao = Convenio::paginate(10);
            return view('convenio.paginacao',compact ('paginacao'));
        }
    }
