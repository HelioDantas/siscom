<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Paciente;


class PacienteController extends Controller
{

//public function __construct()
//{
    /**=========================================================================================* 
     * vai verificar na camada middleware se o usuario atual tem permissao pra acessar
     * esse recurso da aplicação ,
     * e so usuarios autenticados e logados teram o acesso.
     * =========================================================================================*
     */
  //  $this->middleware('autorizador');
//}

public function listar(){
    $pacientes = Paciente::all();
    return view('listarPacientes')->with('pacientes',$pacientes);
    }
    //return view('listarPacientes');

public function mostrar(){
    $id = Request::route('id');
    $produto = Produto::find($id);
    return view('detalhes')->with('p', $produto);
}

public function novo(){
    return view('form'); //retorn formulario para um novo cadastro de cliente.
}


public function adicionar(){
    $params = $request->all();
    $paciente = new Paciente($params);
    $paciente->save();
    /**
     * Produto::create(Request::all());  pode ser add assim tbm
     * =============================================================
     *                  Mais Usado e mais comum de se usar.
     * $params = Request::all();     
     * Produto::create($params);
     * ============================================================
     */
    return redirect('/rota que deve ir depois de ser redirecionado')->withInput();
}

public function remove($id){
    //$id = Request::route('id'); com parametro o laravel ja sabe que e ra buscar o id da requisição.
    $produto = Produto::find($id);
    $produto->delete();
    return redirect()->action('PacienteController@listar');
    //retornar pra mesma pagina onde esta sendo mostrado a lista de pacientes.
}

public function atualizar(){

}

}

