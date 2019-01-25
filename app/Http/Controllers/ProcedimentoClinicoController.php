<?php

namespace App\Http\Controllers;
use App\Models\PermissionProced;
use App\Models\Procedimentoclinico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proceds;
use Symfony\Component\HttpFoundation\Response;

class ProcedimentoclinicoController extends Controller
{ public function listar()
    {
        //  form de um novo produto
        //    return dd($request);
        if (!PermissionProcedController::cad()) {
            return back()->with('Nao_Aceito', 'Nao_Aceito');
        }
        //    $permissao = Permission::all();
        //$especi = Especialidade::all();
       

        $procedimentoclinico = Proceds::paginate(5);
        return view('procedimentoclinico.listar', compact('procedimentoclinico'));
    }
    public function cad()
    {
        return view('procedimentoclinico.cad');
    }

            public function create(Request $request){

                PermissionProcedController::pcad( $request);
          
                $laboratorio = Labs::create([
                   'id'               => $request['id'],
                   'nome'             =>  mb_strtolower($request['nome']),
                   'preco'               => $request['preco'],
                   'id_procedimento'  => $request['id_procedimento'],
                  ]);
          
                   return redirect()->route('procedimentoclinico.listar')->withInput();
    
    }

    public function listart()
    {

        $procedimentoclinico = Proceds::paginate(5);
        return view('procedimentoclinico.listar', compact('procedimentoclinico'));

    }

    public function buscar(Request $request)
    {
        $tipo = $request['tipobusca'];
        $buscar = $request->input('search');
        if ($tipo == null) {
            $proceds =  Proceds::buscaGenerica($buscar);
        } else {
            $proceds = Proceds::where($tipo, 'like', '%' . $buscar . '%')->paginate(10);

        }

        return view('procedimentoclinico.listar', compact('procedimentoclinico'));

    }

    public function buscarId(Request $request, $buscar)
    {
        $Proceds = Proceds::where('id', '=', $buscar);
        return view('procedimentoclinico.listar', compact('procedimentoclinico'));

    }

    public function destroy(Request $request, $id)
    {
        PermissionProcedController::destroy();
        $Proceds = Proceds::find($id);
        $Proceds->delete();
        return back();

    }

    public function edit(Request $request, $id)
    {
        //  form para editar infos de um funcionario
        PermissionProcedController::edit();
        $p = Proced::find($id);

        //   $m = DB::table('sis_medico_tem_especialidade')->where('sis_medico_funcionario_matricula', $p->matricula)->get();

        $e->exame == 'E' ? $s = $l->procedimentoclinico->especialidade : 's';
        /*
        foreach ($m as $m->Sis_especialidade_id => $espec) {
        $tt = $espec->Sis_especialidade_id;
        $s[] = Especialidade::find($tt);

        }*/

        $especialidades = Especialidade::all();
        $Permissao = $p->user->permission()->get();
        //dd($m);
        return view('procedimentoclinico.edit', compact('e', 'p', 'especialidades', 'Permissao'));
    }

    public function update(Request $request, $id)
    {

        PermissionProcedController::edit();

        $procedimentoclinico = Proceds::find($id);
        $id1 = true;
        $id2 = true;
        $procedimentoclinico->update($request->all());
        if ($Procedimentoclinico->exame == 'M') {
            $Procedimentoclinico->procedimentoclinico->update($request->only('id'));
            $request->only('id1')['id1'] != null ? $especialidade[] = $request->only('id1')['id1'] : $id1 = null;
            $request->only('id2')['id2'] != null ? $especialidade[] = $request->only('id2')['id2'] : $id2 = null;

            $id1 == null && $id2 == null ? $Laboratorio->Laboratorio->especialidade()->detach() : $Procedimentoclinico->Procedimentoclinico->especialidade()->sync($especialidade);
        }

        return redirect()->route('procedimentoclinico.listar');
    }

    public function show(Request $request, $id)
    {
        //  form para editar infos de um paciente
        PermissionProcedController::show();
        $p = Proceds::find($id);

        return view('procedimentoclinico.show')->with('p', $p);
    }
}