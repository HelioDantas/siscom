<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use App\Models\Funcionario;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{

    function index(){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        //return dd($especialidade);
        return view('agenda.index', compact('especialidade'));
    }


    function agendar(Request $request){


    }



}
