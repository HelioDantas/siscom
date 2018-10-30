<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paciente;

class PacienteController extends Controller
{
    function indexjs(){
        return view('paciente.indexjs');
    }

    function indexjson(){
        return Paciente::paginate(5);
    }
    
  /*  public function listar()  
    {
        //  listar pacientes.

        //$pacientes = Paciente::all();
        $pacientes = Paciente::paginate(5);
        return view('paciente.listarPacientes' , compact('pacientes'));
    } */

    
    public function novo() 
    {
        //  form de um novo produto

        return view('paciente.formulario');
    }

   
    public function store(Request $request) 
    {
        //  recebe request , dos dados dos formularios

        $req = 'dados' . $request->input('nome'); //passado no form
        return reponse($req ,201);
    }

  
    public function show($id) 
    {
        //  buscar porid
    $id = Request::route('id');
    $paciente = Paciente::find($id);
    return view('detalhes')->with('paciente', $aciente);
    }

  
    public function edit($id) 
    {
        //  editar
        return 'forme edit paciente';
    }

    public function update(Request $request, $id)
    {
        //  atualizar
        return 'retorna reponse com o estatus 200';
    }

   
    public function destroy($id)
    {
        //  deletar

        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('PacienteController@listar');
        //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
    }
}
