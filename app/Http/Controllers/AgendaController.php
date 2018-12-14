<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use App\Models\Funcionario;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
class AgendaController extends Controller
{

    function index(){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        //return dd($especialidade);
        return view('agenda.index', compact('especialidade'));
    }


    function agendar(Request $request){

            $agenda = Agenda::create($request->all());

            return back();


    }

    
    function desmarca($id){

            $agenda = Agenda::find($id);
            $agenda->delete();

            return back();


    }


    function remarcar(Request $request , $id){

        $this->desmarca($id);
        $this->remarcar($request, $id);

        return back();


    }

}
