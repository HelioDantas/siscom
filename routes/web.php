<?php

use App\Models\Paciente;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Auth::routes();

Route::get('/', ['uses' => 'Controller@dashboard'])->middleware('Autorizador')->name('dashboard'); //

//Route::get('/dashboard' , 'Controller@dashboard')->name('dashboard');
Route::post('/teste', 'Controller@dashboard')->name('teste');

/**         Rotas Relacionadas a autenticação
 * ========================================================================================
 *  Admin
 *  Usuario comuns .. secretaria e medico
 */

/**     Rotas Admin
 * =============================================================
 */

Route::get('/sair', 'LoginController@logout')->middleware('Autorizador')->name('login.logout');
Route::get('/recovery', 'UserController@recoveryForm')->name('recovery_senha');


/**=========================================================================== *
 * Rotas ara autenticação,
 * Definindo Rota "/login" como("as") 'user.login'
 * direcionando pro metodo login em controller.
 * =========================================================================== *
 */
Route::get('/login', ['uses' => 'LoginController@login'])->name('user.login');
Route::post("/login", ['as' => 'user.login', 'uses' => 'LoginController@auth']);



/**             ROTAS REFENTE A CLIENTES - RAFAEL ALVARENGA
 * ================================================================================*
 *
 * =================================================================================*
 */

Route::prefix('pacientes')->middleware('auth')->group(function () { //->middleware('Autorizador')-
    //Route::get('listar', 'PacienteController@listar', function () {return App\Models\Paciente::paginate(10);})->name('paciente.listar');
    Route::get('listar'       , 'PacienteController@listar')->name(   'paciente.listar' );
    Route::get('novo', 'PacienteController@novo')           ->name('paciente.novo');
    Route::post('create', 'PacienteController@create')      ->name('paciente.create');
    Route::get('editar/{id}', 'PacienteController@edit')    ->name('paciente.editar');
    Route::get('show/{id}', 'PacienteController@show')      ->name('paciente.show');
    Route::put('update/{id}', 'PacienteController@update')  ->name('paciente.update');
    Route::get('excluir/{id}', 'PacienteController@destroy')->name('paciente.excluir');
    Route::get('index', 'PacienteController@indexjs')       ->name('paciente.js');
    Route::get('json', 'PacienteController@indexjson')      ->name('paciente.json');
    Route::any('buscar', 'PacienteController@buscar')       ->name('funcionario.buscar'); 
   
        /*Route::get('index'       ,  'PacienteController@indexjs')->name(  'paciente.js'     );
        Route::get('json'        ,  'PacienteController@indexjson')->name('paciente.json');*/

});


Route::get('/novo/get-planos/{convenio_id}', 'ConvenioController@getPlano')->middleware('Autorizador');
Route::get('/especialidade/{espec_id}', 'MedicoController@getEspecialidade')->middleware('Autorizador');




/**=============================================================
 *                      ROTAS MEDICO
 * 
 *=============================================================
 */
Route::prefix('medico')->middleware('Autorizador')->group(function () {
    Route::get('novo/{id}', 'MedicoController@planoNovo')                               ->name('medico.planoNovo');
    Route::any('create/{id}&&{medico_id}', 'MedicoController@planoCreate')              ->name('medico.planoCreate');
    Route::any('desativar_plano/{id}&&{plano_id}', 'MedicoController@desativar_plano')  ->name('medico.desativar_plano');
    Route::get('agendar', 'MedicoController@agenda')                                    ->name('medico.agenda');
    Route::get('agendar/{date?}/{espec?}', 'MedicoController@agenda');
    Route::get('atendimento/{id?}', 'MedicoController@atendimento')                     ->name('medico.atendimento');
    Route::post('registro2' , 'RegistroClinicoController@novoRegistro')                    ->name('novo.registro');
    Route::post('registro' , 'MedicoController@novoRegistro')                           ->name('medico.registro');
    Route::get('RegistrosClinicos/{id?}', 'MedicoController@RegistrosClinicos')                     ->name('medico.RegistrosClinicos');
     Route::any('BuscarPorRegistrosClinicos', 'MedicoController@BuscarPorRegistrosClinicos')                     ->name('medico.BuscarPorRegistrosClinicos');

   
    
});




/**=============================================================
 *                      ROTAS FUNCIONARIO
 * 
 *=============================================================
 */
Route::prefix('funcionario')->middleware('Autorizador')->group(function () { //->middleware('Autorizador')->

    Route::get('cad', 'FuncionarioController@novo')                     ->name('funcionario.novo');
    Route::get('listar', 'FuncionarioController@listar')                ->name('funcionario.listar');
    Route::get('excluir/{id}', 'FuncionarioController@destroy')         ->name('funcionario.excluir');
    Route::post('create', 'FuncionarioController@create')               ->name('funcionario.create');
    Route::get('editar/{id}', 'FuncionarioController@edit')             ->name('funcionario.editar');
    Route::get('show/{id}', 'FuncionarioController@show')               ->name('funcionario.show');
    Route::put('update/{id}', 'FuncionarioController@update')           ->name('funcionario.update');
    Route::get('buscarCpf', 'FuncionarioController@buscarCpf')          ->name('funcionario.buscarCpf');
    Route::any('medico/create/{id}', 'FuncionarioController@Medicocreate')->name('medico.create');
    Route::get('medico/cad', 'FuncionarioController@novoM')              ->name('medico.novo');
    Route::get('excluir/{id}', 'FuncionarioController@destroy')         ->name('funcionario.excluir');
    Route::any('buscar', 'FuncionarioController@buscar')                ->name('funcionario.buscar');

        Route::prefix('user')->middleware('Autorizador')->group(function () {
            Route::get('novo', 'UserController@novo')->name('user.novo');
            Route::post('create', 'UserController@create')->name('user.create');
            Route::get('permissoes/{id}', 'UserController@permissoes')->name('user.permissoes');
            Route::get('new/{id}', 'UserController@newPermissoes')->name('user.newPermissoes');
            Route::any('create/{id}&&{user_id}', 'UserController@createPermissoes')->name('user.createPermissoes');
            Route::any('destroy/{id}&&{user_id}', 'UserController@destroyPermissoes')->name('user.destroyPermissoes');
        });

});



/**=============================================================
 *                      ROTAS CONVENIO
 * 
 *=============================================================
 */
Route::prefix('convenio')->middleware('Autorizador')->group(function () {

    Route::get('listar', 'ConvenioController@index')                        ->name('convenio.listar');
    Route::get('novo', 'ConvenioController@novo')                           ->name('convenio.novo');
    Route::get('detalhe/{id}', 'ConvenioController@detalhe')                ->name('convenio.detalhe');
    Route::get('detalhe/Procedimento/{id}', 'ProcedimentoController@detalhe')->name('convenio.detalhe.procedimento');
    Route::get('novo', 'ConvenioController@novo')                           ->name('convenio.novo');
    Route::post('create', 'ConvenioController@create')                      ->name('convenio.create');
    Route::get('editar/{id}', 'ConvenioController@editar')                  ->name('convenio.editar');
    Route::get('editar/{id}', 'ConvenioController@editar')                  ->name('convenio.alterar');
    Route::put('update/{id}', 'ConvenioController@update')                  ->name('convenio.update');
    Route::post('assoc', 'PlanoController@assocPlano')                      ->name('convenio.plano.assoc');
    Route::get('delete/{id}', 'PlanoController@assocDelete')                ->name('convenio.plano.assoc.delete');


});
/**=============================================================
 *                      ROTAS PROCEDIMENTOS
 * 
 *=============================================================
 */
Route::prefix('procedimento')->middleware('Autorizador')->group(function(){
    Route::get('novo/{id}', 'ProcedimentoController@novo')->name('procedimento.novo');
    Route::post('create', 'ProcedimentoController@create')->name('procedimento.create'); 
    Route::post('plano/assoc', 'ProcedimentoController@planoAssoc')->name('procedimento.plano.assoc');
    Route::get('delete/{id}/proced/{codtuss}', 'ProcedimentoController@assocDelete')->name('proced.plano.assoc.delete');


});

Route::get('/testeRelacionamento', function () {
    return dd(Paciente::where('id', '=', 150));
});

Route::get('/erro', function () {
    return abort(403, 'Não autorizado');
})->name('erro');



Route::get('/home', 'HomeController@index')->name('home');
/**=============================================================
 *                      ROTAS AGENDA
 * 
 *=============================================================
 */
Route::prefix('agenda')->middleware('Autorizador')->group(function(){
    Route::get('index', 'AgendaController@index')->name('agenda.index');
    Route::post('excluir', 'AgendaController@destroy')->name('agenda.destroy');
    Route::post('desmarcar', 'AgendaController@desmarcar')->name('agenda.desmarcar');
    Route::post('agendar', 'AgendaController@agendar')->name('agenda.agendar');
    Route::get('paciente/{id}', 'AgendaController@editarPaciente')->name('agenda.editarPaciente');
     Route::put('editar', 'AgendaController@update')->name('agenda.update');
     Route::get('historico/{id}', 'AgendaController@historico')->name('agenda.historico');

});




/**=============================================================
 *                      ROTAS AJAX
 * 
 *=============================================================
 */
Route::get('/get/esp/{id}', 'AgendaController@getMedicosEsp');
Route::get('/get/proced/{id}', 'AgendaController@getMedicosProced');
Route::get('/get/proced/preco/{id}/{plano}', 'AgendaController@getMedicosProcedPreco');
Route::get('agd/medico/{medicoId?}/{date?}/{espec?}', 'AgendaController@index')->middleware('Autorizador');
Route::get('buscarName', 'AgendaController@buscarName')->middleware('Autorizador');
Route::get('buscarCpf', 'AgendaController@buscarCpf')->middleware('Autorizador');
Route::get('novo/get-planos/{convenio_id}', 'ConvenioController@getPlano')->middleware('Autorizador');
Route::get('medd/{date?}/{espec?}', 'MedicoController@agenda')->middleware('Autorizador');
Route::get('cpf/{cpf}', 'PacienteController@buscarCpf')->middleware('Autorizador');
Route::get('nome/{nome}', 'PacienteController@buscarNome')->middleware('Autorizador');
Route::get('/get/data/agd/{id}', 'AgendaController@getAgendamentos');
Route::get('registro/{paciente_id}', 'RegistroClinicoController@getAjax');



