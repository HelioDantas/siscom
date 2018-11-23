<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;
use App\Models\TipoConvenio;
use App\Models\Convenio;
use App\Models\PacienteHasConvenio;
use App\Models\Plano;

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

    // filtro da tabela listar
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
        $convenios = Convenio::all();
        $planos = Plano::all();
         //dd($convenio->tipoConvenios);

        
        return view('paciente.formulario' ,compact('convenios','planos'));
    }

    public function create(Request $request){
        
        $paciente = Paciente::create($request->all());
        
        $planoPaciene = PacienteHasConvenio::create([
            'plano_id' => $request['plano_id'],
            'indicacao'  => $request['indicacao'],
            'carteira'  => $request['carteira'],
            'situacao'  => $request['situacao'],
            'paciente_id'  =>$paciente->id,
        ]);
     
        return redirect()->route('paciente.listar');
        
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);


    }

    public function edit( $id) 
    {
        //  form para editar infos de um paciente
       $p = Paciente::find($id);
       $plano = $p->planos()->where('situacao','ATIVO')->first();
       $convenio = Convenio::where('cnpj', $plano->convenio_id)->first();
       $convenios = Convenio::all();
        return view('paciente.editar' , compact('p','convenio','convenios','plano'));
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
        return back();
        //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
    }
}
