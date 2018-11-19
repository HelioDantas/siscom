<?php

namespace App\Http\Controllers;
use App\Models\Convenio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Convenio;


class ConvenioController extends Controller
{   
    private $convenios;

    public function _construtor(Convenio $convenios){
        $this->Convenio = $convenios;

    }


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
                return redirect()->route('convenio.editar');


        }
        public function find (Request $request, $id){
            $convenio = Convenio::find($id);
            $convenio->update($request->all());
                return redirect()->route('convenio.listar');

        }

        function insert(Request$req){
            $cnpj = $req->input('cnpj');
            $nome = $req->input('nome');
            $banco = $req->input('banco');
            $agencia = $req->input('agencia');
            $conta = $req->input('conta');
            $status = $req->input('status');
            
        }
}
