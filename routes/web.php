<?php

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

/**
 * Rotas para cadastro paciente
 * 
 */

Route::get('/', function () {
    return 'tela cade paciente';
});


Route::get('/pacientes' , 'PacienteController@listar');
Route::get('/home', function(){
    return view('sistema');
});


/**
 * Routes to login users
 * 
 */
Route::post('/login','LoginController@login');
Route::get('/login','LoginController@form');


Route::get('/cad' , 'LoginController@cad');