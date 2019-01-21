<?php

namespace App\Http\Controllers;
use App\Models\Procedimentoclinico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proceds;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ProcedimentoclinicoRequest;


class ProcedimentoclinicoController extends Controller
{
    public function index(Request $request)
    {
        //  form de um novo produto
        //    return dd($request);
        if (!PermissionProcedController::cad()) {
            return back()->with('Nao_Aceito', 'Nao_Aceito');
        }
        //    $permissao = Permission::all();
        //$especi = Especialidade::all();

        $procedimentoclinico = Proceds::paginate(5);
        return view('procedimentoclinico.listar', compact('especi', 'procedimentoclinico'));
    }

    public function create(ProcedimentoclinicoRequest $request)
    {

        PermissionProcedController::cad();

        try {

            $procedimentoclinico = Procedimento::create([
                'id' => mb_strtolower($request['id']),
                'nome' => mb_strtolower($request['nome']),
                'preco' => mb_strtolower($request['preco']),
                'id_procedimento' => mb_strtolower($request['id_procedimento']),
              
            ]);

        } catch (\Exception $e) {

            return redirect()->back()->with("idJaCadastrdo", 'o id  ' . $request['id'] . ' já consta cadastrado!!');

        }

        //  return var_dump($sis_funcionario);
        if ($Procedimentoclinico->exame == "A") {
            return redirect('procedimentoclinico/user/index')->with('Procedimentoclinico', $Procedimentoclinico);
            //     return redirect()->route('user.novo')->with('Funcionario', $Funcionario);
            //    return view('user.novo', compact('permissao','Funcionario'));

        } else {

            if ($Procedimentoclinico->exame == "E") {
                $procedimentoclinico = new Procedimentoclinico();
                $valor = $request->all('id');
                $procedimentoclinico->id = $valor['id'];
                $procedimentoclinico->sis_procedimentoclinico_id = $procedimentoclinico->id;
                $procedimentoclinico->save();
                $procedimentoclinico = Procedimentoclinico::find($Procedimentoclinico->id);
                $request->only('id1')['id1'] != null ? $especialidade[] = $request->only('id1')['id1'] : '';
                $request->only('id2')['id2'] != null ? $especialidade[] = $request->only('id2')['id2'] : '';
                if (!empty($especialidade)) {
                    $procedimentoclinico->especialidade()->attach($especialidade);
                }

                $procedimentoclinico = $request->only('$p');
                foreach ($procedimentoclinico as $id) {
                    $procedimentoclinico[] = $id[0];

                }
                if (!empty($procedimentoclinico)) {
                    $procedimentoclinico->procedimentoclinico()->attach($procedimentoclinico);
                }

                return redirect('procedimentoclinico/user/index')->with('Procedimentoclinico', $Laboratorio);
            }
        }
    }

    public function listar()
    {

        $proceds = Procedimentoclinico::paginate(5);
        return view('procedimentoclinico.listar', compact('proceds'));

    }

    public function buscar(Request $request)
    {
        $tipo = $request['tipobusca'];
        $buscar = $request->input('search');
        if ($tipo == null) {
            $proceds =  ProcedimentoclinicoController::buscaGenerica($buscar);
        } else {
            $proceds = Procedimentoclinico::where($tipo, 'like', '%' . $buscar . '%')->paginate(10);

        }

        return view('procedimentoclinico.listar', compact('proceds'));

    }

    public function buscarId(Request $request, $buscar)
    {
        $Proceds = Procedimentoclinico::where('id', '=', $buscar);
        return view('procedimentoclinico.listar', compact('Proceds'));

    }

    public function destroy(Request $request, $id)
    {
        PermissionProcedController::destroy();
        $Proceds = Procedimentoclinico::find($id);
        $Laboratorio->delete();
        return back();

    }

    public function edit(Request $request, $id)
    {
        //  form para editar infos de um funcionario
        PermissionProcedController::edit();
        $p = Procedimentoclinico::find($id);

        //   $m = DB::table('sis_medico_tem_especialidade')->where('sis_medico_funcionario_matricula', $p->matricula)->get();

        $p->exame == 'E' ? $s = $p->procedimentoclinico->especialidade : 's';
        /*
        foreach ($m as $m->Sis_especialidade_id => $espec) {
        $tt = $espec->Sis_especialidade_id;
        $s[] = Especialidade::find($tt);

        }*/

        $especialidades = Especialidade::all();
        $Permissao = $p->user->permission()->get();
        //dd($m);
        return view('procedimentoclinico.editar', compact('p', 's', 'especialidades', 'Permissao'));
    }

    public function update(ProcedimentoclinicoRequest $request, $id)
    {

        PermissionProcedController::edit();

        $Procedimentoclinico = Procedimento::find($id);
        $id1 = true;
        $id2 = true;
        $Procedimentoclinico->update($request->all());
        if ($Procedimentoclinico->exame == 'M') {
            $Procedimentoclinico->procedimentoclinico->update($request->only('id'));
            $request->only('id1')['id1'] != null ? $especialidade[] = $request->only('id1')['id1'] : $id1 = null;
            $request->only('id2')['id2'] != null ? $especialidade[] = $request->only('id2')['id2'] : $id2 = null;

            $id1 == null && $id2 == null ? $Proocedimentoclinico->Procedimentoclinico->especialidade()->detach() : $Procedimentoclinico->procedimentoclinico->especialidade()->sync($especialidade);
        }

        return redirect()->route('procedimentoclinico.listar');
    }

    public function show(Request $request, $id)
    {
        //  form para editar infos de um paciente
        PermissionProcedController::show();
        $p = Procedimentoclinico::find($id);

        return view('procedimentoclinico.show')->with('p', $l);
    }
}