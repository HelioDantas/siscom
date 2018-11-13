<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{

    function indexjs(){
        return view('paciente.index');
    }


    function indexjson(){

        return Paciente::paginate(10);
    }


    public function show($id) 
    {

    $id = Request::route('id');
    $paciente = Paciente::find($id);
    return view('detalhes')->with('paciente', $paciente);
    }

    
    public function listar()  
    {
        //  listar pacientes.

        //$pacientes = Paciente::where('nome', $nome)->get();
        $pacientes = Paciente::paginate(10);
        return view('paciente.listar' , compact('pacientes'));
        //testando
    } 

    public function buscar(Request $request){
        $buscar = $request->input('search');
        $pacientes = Paciente::where('nome', 'like', '%'.$buscar.'%')
        ->orWhere('cpf', 'like', '%'.$buscar.'%')
        ->orWhere('id', 'like', '%'.$buscar.'%')
        ->paginate(10);
        return view('paciente.listar' , compact('pacientes'));
       
      } 

    
    public function novo() 
    {
        //  form de um novo paciente

        return view('paciente.formulario');
    }

    public function create(Request $request){
        
        //$paciente = $request->all();
        //return dd($paciente);
        $paciente = Paciente::create($request->all());
        return  redirect()->route('paciente.listar');
        
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);


    }

    public function edit( $id) 
    {
        //  form para editar infos de um paciente
       $p = Paciente::find($id);

        return view('paciente.editar')->with('p' , $p);
    }
   

    public function update(Request $request, $id)
    {
        //  atualizar

        $paciente = Paciente::find($id);
        $paciente->update($request->all());
        return redirect()->route('paciente.listar');
    }

   
    public function store(Request $request) 
    {
        //  recebe request , dos dados dos formularios

        $req = 'dados' . $request->input('nome'); // passado no form
        return reponse($req ,201);
    }
   
    public function destroy($id)
    {
        //  deletar

        $paciente = Paciente::find($id);
       // $paciente = Paciente::find($prontuario);
        $paciente->delete();
       //Paciente::destroy($prontuario);

       // DB::delete("delete from sis_paciente where prontuario = $prontuario");
        return redirect()->action('PacienteController@listar');
        //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
    }
}
