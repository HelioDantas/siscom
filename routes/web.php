<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;


Auth::routes();

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
//Route::get('/' ,['uses' => 'Controller@dashboard']);
Route::get('/' ,'LoginController@login')->name('user.login');
Route::post('/login' ,'LoginController@fazerlogin')->name('user.logar');
Route::get('/sair' , 'LoginController@logout')->name('user.logout');

Route::get('/dashboard' , 'Controller@dashboard')->name('dashboard');
Route::post('/teste' ,'Controller@dashboard')->name('teste');


/**         Rotas Relacionadas a autenticação
 * ========================================================================================
 *  Admin 
 *  Usuario comuns .. secretaria e medico
 */

/**     Rotas Admin
 * =============================================================
 */



  /** Rota redirecionar quando autenticado */
//Route::get('/',['uses' => 'Controller@home'])->middleware('autorizador')->name('home');
//Route::get('/home','Controller@home')->middleware('autorizador')->name('home');


/** Rota redirecionar quando não autenticado */
//Route::get('/', 'LoginController@formCad')->name('formulario');

/** Rota para enviar as infos da requisição para autenticação no method login */
//Route::post('/login','LoginController@login');


//Route::get('/pacientes' , 'PacienteController@listar')->middleware('autorizador');





/**=========================================================================== *
 * Rotas ara autenticação,
 * Definindo Rota "/login" como("as") 'user.login'
 * direcionando pro metodo login em controller.
 * =========================================================================== *
 */
//Route::post("/login", ['as' => 'user.login', 'uses' => 'Controller@login']);


//Route::get('/cad' , 'LoginController@cad');


/**             ROTAS REFENTE A CLIENTES - RAFAEL ALVARENGA
 * ================================================================================*
 * 
 * 
 * 
 * 
 * 
 * =================================================================================*
 */

Route::prefix('pacientes')->group(function () {
  Route::get('listar', 'PacienteController@listar')->name('paciente.listar');
  Route::get('cad' , 'PacienteController@novo')->name('paciente.novo');
  Route::get('index','PacienteController@indexjs')->name('paciente.js');
  Route::get('json','PacienteController@indexjson')->name('paciente.json');
});


//Route::resource('/pacientes', 'PacienteController');




