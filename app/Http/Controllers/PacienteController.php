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
use App\Http\Requests\PacienteRequest;
use Str;
use App\Http\Controllers\PermissionController;
class PacienteController extends Controller
{

    function indexjs(){
        return view('paciente.index');
    }


    function indexjson(){
            
        return Paciente::paginate(10);
    }


    public function shown($id)
    {

    $id = Request::route('id');
    $paciente = Paciente::find($id);
    return view('detalhes')->with('paciente', $paciente);
    }


    public function listar()
    {
        //  listar pacientes.
     
        //$pacientes = Paciente::where('nome', $nome)->get();
        $pacientes = Paciente::orderBy('nome')->paginate(10);
        return view('paciente.listar' , compact('pacientes'));
        //testando
    }

    // filtro da tabela listar
    public function buscar(Request $request){
         $tipo = $request['tipobusca'];
        $buscar = $request->input('search');

        if($tipo == null){
               $pacientes = Paciente::where('nome', 'like', '%'.$buscar.'%')
                ->orWhere('cpf', 'like', '%'.$buscar.'%')
                ->orWhere('id',$buscar)
                ->paginate(10);


        }

        switch($tipo){
            case "nome":
            $pacientes = Paciente::where($tipo, 'like', '%'.$buscar.'%')->paginate(10);
            break;

            case "cpf":
            $pacientes = Paciente::where($tipo, 'like', '%'.$buscar.'%')->paginate(10);
            break;

            case "telefone":
            $pacientes = Paciente::where($tipo, 'like', '%'.$buscar.'%')->orWhere('celular', 'like', '%'.$buscar.'%')->paginate(10);
            break;

            case "id":
            $pacientes = Paciente::where($tipo,'=',$buscar)->paginate(10);
            break;

        }

            return view('paciente.listar' , compact('pacientes'));

      }


    public function novo(Request $request)
    {
            
        //  form de um novo paciente
         PermissionController::pnovo( $request);

        $convenios = Convenio::all();
        $planos = Plano::all();
         //dd($convenio->tipoConvenios);


        return view('paciente.formulario' ,compact('convenios','planos'));
    }

   

    public function create(PacienteRequest $request){

          PermissionController::pnovo( $request);

        $paciente = Paciente::create([
        'nome'              =>  mb_strtolower($request['nome']),
        'org_emissor'       =>  mb_strtolower($request['org_emissor']),
        'nacionalidade'     =>  mb_strtolower($request['nacionalidade']),
        'naturalidade'      =>  mb_strtolower($request['naturalidade']),
        'rua'               =>  mb_strtolower($request['rua']),
        'bairro'            =>  mb_strtolower($request['bairro']),
        'cidade'            =>  mb_strtolower($request['cidade']),
        'email'             =>  mb_strtolower($request['email']),
        'profissao'         =>  mb_strtolower($request['profissao']),
        'estado'            =>  mb_strtolower($request['estado']),
        'cpf'               => $request['cpf'],
        'sexo'              => $request['sexo'],
        'etnia'             => $request['etnia'],
        'identidade'        => $request['identidade'],
        'dataDeNascimento'  => $request['dataDeNascimento'],
        'escolaridade'      => $request['escolaridade'],
        'cep'               => $request['cep'],
        ]);

        $paciente->planos()->attach($request['plano_id'],
        [ 'indicacao'  =>  mb_strtolower($request['indicacao']),
            'carteira'  => $request['carteira']]);



         return redirect()->route('paciente.listar')->withInput();


       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);


    }
    public function edit(Request $request,  $id)
    {
        //  form para editar infos de um funcionario
        $tt =PermissionController::pedit( $request);


       $p = Paciente::find($id);
       
      $plano = $p->planos()->where('situacao','ATIVO')->first();
       if ( !$plano == null) {
        $phc = $plano->pivot;
        $convenio = Convenio::where('id', $plano->convenio_id)->first();
       } else {
           $plano =null; $phc =null; $convenio =null;
       }

       //$phc = PacienteHasConvenio::where('paciente_id','=',$id,'and','plano_id','=',$plano->convenio_id )->first();

       //$convenioIsNull = (Convenio::where('cnpj', $plano->convenio_id)->first()) ?  $convenio = $convenioIsNull : $convenio = '' ;
      // $convenio = Convenio::where('cnpj', $plano->convenio_id)->first();

       $convenios = Convenio::all();
        return view('paciente.editar' , compact('p','convenio','convenios','plano','phc'));
    }



    public function update(PacienteRequest $request, $id)
    {
       


        PermissionController::pedit( $request);


     
     $paciente = Paciente::find($id)->planos()->where('situacao', 'ATIVO')->first();

        if($paciente !=null && $paciente->pivot['plano_id'] == $request['plano_id']){
       Paciente::find($id)->planos()->where('situacao', 'ATIVO')->update(
                [
                    'paciente_id'   => $id,
                    'indicacao'  => $request['indicacao'],
                    'carteira'   => $request['carteira'],
                    'situacao'  =>  $request['situacao']
                                            ]);

         }else{
             if($paciente != null)
                Paciente::find($id)->planos()->updateExistingPivot($paciente->pivot['plano_id'], ['situacao'=>'INATIVO']);

             Paciente::find($id)->planos()->attach($request['plano_id'],
                [
                    'indicacao'  => $request['indicacao'],
                    'carteira'  => $request['carteira']
                                                            ]);

         }




            // dd($phc->where('paciente_id', '=',  $pacientePlano->id)->where('situacao','=','INATIVO' )->get());
            $paciente = Paciente::find($id);
            $paciente->update($request->all());





/*
        //  atualizar
        //dd($request);
        $paciente = Paciente::find($id);
        $ativos = $paciente->planos()->where('situacao','ATIVO')->get();

        if (!$ativos == null) { // se houver ativos

            PacienteHasConvenio::where('paciente_id', '=', $paciente->id)->where('situacao','=','ATIVO' )->orWhere('situacao','=','NULL')->update(['situacao'=>'INATIVO']);

               PacienteHasConvenio::updateOrCreate([
                'paciente_id' => $paciente->id,
                'plano_id'   => $request['plano_id'],
                'indicacao'  => $request['indicacao'],
              //  'carteira'   => $request['carteira'],
                'situacao' => 'ATIVO',
               ]);
        }

    /* if (!$inativos == null){
        $inativo = PacienteHasConvenio::where('paciente_id', '=', $paciente->id)
         ->where('plano_id','=', $request['plano_id'])
         ->Where('carteira','=',$request['carteira'])->update(['situacao'=> 'ATIVO']);

        }
       // dd($phc->where('paciente_id', '=',  $pacientePlano->id)->where('situacao','=','INATIVO' )->get());

        $paciente->update($request->except([
            'convenio_id',
            'plano_id',
            'indicacao',
            'carteira',
            '_token']));

*/
        return redirect()->route('paciente.listar');
    }


    public function store(Request $request)
    {
        //  recebe request , dos dados dos formularios

        $req = 'dados' . $request->input('nome'); // passado no form
        return reponse($req ,201);
    }

    public function destroy(Request $request, $id)
    {
        //  deletar
        $tt = PermissionController::pdestroy( $request);


            $paciente = Paciente::find($id);
           // dd( $paciente = Paciente::find($id));

        $paciente->delete();


            //Paciente::destroy($prontuario);

            // DB::delete("delete from sis_paciente where prontuario = $prontuario");
            //Paciente::where('id', $id)->delete();
             return redirect()->back();
             //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.


    }

        public function show(Request $request, $id)
    {
        //  form para editar infos de um paciente
       $tt = PermissionController::pshow( $request);



      $p = Paciente::find($id);
      $plano = $p->planos()->where('situacao','ATIVO')->first();
       if ( !$plano == null) {
        $phc = $plano->pivot;
        $convenio = Convenio::where('id', $plano->convenio_id)->first();
       } else {
           $plano =null; $phc =null; $convenio =null;
       }



       $convenios = Convenio::all();
        return view('paciente.show' , compact('p','convenio','convenios','plano','phc'));

    }




    public function buscarCpf( $buscar)
    {
        $Funcionarios = Paciente::where('cpf', '=', $buscar)->get();
        return json_encode($Funcionarios);

    }
      public function buscarNome( $buscar)
    {
        $Funcionarios = Paciente::where('nome', '=', $buscar)->get();
        return json_encode($Funcionarios);

    }
}

  