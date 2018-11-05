<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
Route::get('/' ,['uses' => 'Controller@dashboard'])->middleware('Autorizador');

//Route::get('/home' ,['uses' => 'Controller@dashbo'])


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
Route::get('/sair','LoginController@logout')->name('login.logout');


//Route::get('/pacientes' , 'PacienteController@listar')->middleware('autorizador');





/**=========================================================================== *
 * Rotas ara autenticação,
 * Definindo Rota "/login" como("as") 'user.login'
 * direcionando pro metodo login em controller.
 * =========================================================================== *
 */
Route::get('/login' , ['uses' => 'LoginController@formLogin']);
Route::post("/login", ['as' => 'user.login', 'uses' => 'LoginController@login']);




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
  Route::get('listar', 'PacienteController@listar')->name('paciente.listar')->middleware('Autorizador');
  Route::get('cad' , 'PacienteController@novo')->name('paciente.novo')->middleware('Autorizador');
});


//Route::resource('/pacientes', 'PacienteController');


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('funcionario')->group(function(){

  Route::get('cad', 'FuncionarioController@novo')->name('funcionario.novo')->middleware('Autorizador');



});



Route::prefix('user')->group(function(){

  Route::get('novo', 'UserController@novo')->name('user.novo')->middleware('Autorizador');



});