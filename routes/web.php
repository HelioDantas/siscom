<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvenioControl;


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


Route::get()


/**             ROTAS CONVÊNIO
 * ================================================================================*
 *
 *
 * =================================================================================*/

  Route::prefix('convenio')->group(function () {

  Route::get('listaconvenio', 'ConvenioControl@listaconvenio')->name('convenio.listaconvenio' );
  Route::get('novo'        ,  'ConvenioControl@novo')->name(        'convenio.novo');
  Route::post('create'     ,  'ConvenioControl@create')->name(      'convenio.create' );
  #Route::get('pesquisar/{id}','ConvenioControl@alterar')->name(     'convenio.pesquisar' );
  #Route::put('update/{id}' ,  'ConvenioControl@update')->name(      'convenio.update' );
  Route::get('alterar/{id}' , 'ConvenioControl@alterar')->name(     'convenio.alterar' );
  Route::put('update/{id}' ,  'ConvenioControl@update')->name(      'convenio.update' );
  /*Route::get('index'       ,  'PacienteController@indexjs')->name(  'paciente.js'     );
  Route::get('json'        ,  'PacienteController@indexjson')->name('paciente.json');*/
});

  Route::prefix('user')->group(function(){
  Route::get('cad','ConvenioControl@novo')->name('convenio.novo')->middleware('Autorizador');
  Route::post('create','ConvenioControl@create')->name('convenio.create')->middleware('Autorizador');
}); 
  