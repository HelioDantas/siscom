<?php

namespace App\Http\Controllers;

use App\Models\PermissionLab;
use App\Models\Labs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class LaboratorioController extends Controller
{
    public function listar()
    {
        //  form de um novo produto
        //    return dd($request);
        if (!PermissionLabController::cad()) {
            return back()->with('Nao_Aceito', 'Nao_Aceito');
        }
        //    $permissao = Permission::all();
        //$especi = Especialidade::all();
       

        $laboratorio = Labs::paginate(5);
        return view('laboratorio.listar', compact('laboratorio'));
    }
    public function cad()
    {
        return view('laboratorio.cad');
    }

            public function create(Request $request){

                PermissionLabController::lcad( $request);
          
                $laboratorio = Labs::create([
                   'id'               => $request['id'],
                   'nome'             =>  mb_strtolower($request['nome']),
                   'id_procedimento'  => $request['id_procedimento'],
                  ]);
          
                   return redirect()->route('laboratorio.listar')->withInput();
    
    }

    public function listarp()
    {

        $laboratorio = Labs::paginate(5);
        return view('laboratorio.listar', compact('laboratorio'));

    }

    public function buscar(Request $request)
    {
        $tipo = $request['tipobusca'];
        $buscar = $request->input('search');
        if ($tipo == null) {
            $labs =  Labs::buscaGenerica($buscar);
        } else {
            $labs = Labs::where($tipo, 'like', '%' . $buscar . '%')->paginate(10);

        }

        return view('laboratorio.listar', compact('laboratorio'));

    }

    public function buscarId(Request $request, $buscar)
    {
        $Labs = Labs::where('id', '=', $buscar);
        return view('laboratorio.listar', compact('laboratorio'));

    }

    public function destroy(Request $request, $id)
    {
        PermissionLabController::destroy();
        $Labs = Labs::find($id);
        $Laboratorio->delete();
        return back();

    }

    public function edit(Request $request, $id)
    {
        //  form para editar infos de um funcionario
        PermissionLabController::edit();
        $p = Labs::find($id);

        //   $m = DB::table('sis_medico_tem_especialidade')->where('sis_medico_funcionario_matricula', $p->matricula)->get();

        $e->exame == 'E' ? $s = $l->laboratorio->especialidade : 's';
        /*
        foreach ($m as $m->Sis_especialidade_id => $espec) {
        $tt = $espec->Sis_especialidade_id;
        $s[] = Especialidade::find($tt);

        }*/

        $especialidades = Especialidade::all();
        $Permissao = $p->user->permission()->get();
        //dd($m);
        return view('laboratorio.edit', compact('e', 'p', 'especialidades', 'Permissao'));
    }

    public function update(Request $request, $id)
    {

        PermissionLabController::edit();

        $Laboratorio = Labs::find($id);
        $id1 = true;
        $id2 = true;
        $Laboratorio->update($request->all());
        if ($Laboratorio->exame == 'M') {
            $Laboratorio->laboratorio->update($request->only('id'));
            $request->only('id1')['id1'] != null ? $especialidade[] = $request->only('id1')['id1'] : $id1 = null;
            $request->only('id2')['id2'] != null ? $especialidade[] = $request->only('id2')['id2'] : $id2 = null;

            $id1 == null && $id2 == null ? $Laboratorio->Laboratorio->especialidade()->detach() : $Laboratorio->laboratorio->especialidade()->sync($especialidade);
        }

        return redirect()->route('laboratorio.listar');
    }

    public function show(Request $request, $id)
    {
        //  form para editar infos de um paciente
        PermissionLabController::show();
        $p = Labs::find($id);

        return view('laboratorio.show')->with('p', $l);
    }
}