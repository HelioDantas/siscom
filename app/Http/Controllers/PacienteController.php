<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PacienteController extends Controller
{

public function __construct()
{
    /**=========================================================================================* 
     * vai verificar na camada middleware se o usuario atual tem permissao pra acessar
     * esse recurso da aplicação ,
     * e so usuarios autenticados e logados teram o acesso.
     * =========================================================================================*
     */
    $this->middleware('autorizador');
}

public function listar(){
    $pacientes = DB::select('select * from pacientes');
    return view('listarPacientes')->with('pacientes',$pacientes);
    }
    //return view('listarPacientes');
}

