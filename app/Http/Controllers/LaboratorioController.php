<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PermissionLabController;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Labs;
use App\Models\PermissionLab;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\LaboratorioRequest;


class LaboratorioController extends Controller
{

    public function index(Request $request)
    {
        //  form de um novo produto
        //    return dd($request);
        $laboratorios = Labs::orderBy('nome')->paginate(10);
        return view('laboratorio.listar' , compact('laboratorios'));
        
        //    $permissao = Permission::all();
        //$especi = Especialidade::all();
    }
    public function cad()
    {
        return view('laboratorio.cad');
    }

    public function create(Request $request)
    {

        PermissionLabController::cad();

        try {

            $Laboratorio = Labs::create([
                'id' => mb_strtolower($request['id']),
                'nome' => mb_strtolower($request['nome']),
                'id_procedimento' => mb_strtolower($request['id_procedimento']),
              
            ]);

        } catch (\Exception $e) {

            return redirect()->back()->with("idJaCadastrdo", 'id' . $request['id'] . ' já consta cadastrado!!');

        }

        //  return var_dump($sis_funcionario);
        if ($Laboratorio->clinica == "A") {
            return redirect('laboratorio/user/cad')->with('Funcionario', $Laboratorio);
            //     return redirect()->route('user.novo')->with('Funcionario', $Funcionario);
            //    return view('user.novo', compact('permissao','Funcionario'));

        } else {

            if ($Laboratorio->clinica == "L") {
                $laboratorio = new Laboratorio();
                $valor = $request->all('id');
                $laboratorio->id = $valor['id'];
                $laboratorio->sis_laboratorio_id = $Laboratorio->id;
                $laboratorio->save();
                $laboratorio = Laboratorio::find($Laboratorio->id);
                $request->only('id1')['id1'] != null ? $especialidade[] = $request->only('id1')['id1'] : '';
                $request->only('id2')['id2'] != null ? $especialidade[] = $request->only('id2')['id2'] : '';
                if (!empty($especialidade)) {
                    $laboratorio->especialidade()->attach($especialidade);
                }

                $laboratorio = $request->only('$l');
                foreach ($laboratorio as $id) {
                    $laboratorio[] = $id[0];

                }
                if (!empty($laboratorio)) {
                    $laboratorio->laboratorio()->attach($laboratorio);
                }

                return redirect('laboratorio/user/index')->with('Laboratorio', $Laboratorio);
            }
        }
    }

    public function listar()
    {

        $labs = Labs::paginate(5);
        return view('laboratorio.listar', compact('labs'));

    }

    public function buscar(Request $request)
    {
        $tipo = $request['tipobusca'];
        $buscar = $request->input('search');
        if ($tipo == null) {
            $labs =  LaboratorioController::buscaGenerica($buscar);
        } else {
            $labs = Labs::where($tipo, 'like', '%' . $buscar . '%')->paginate(10);

        }

        return view('laboratorio.listar', compact('labs'));

    }

    public function buscarId(Request $request, $buscar)
    {
        $Labs = Labs::where('id', '=', $buscar);
        return view('laboratorio.formulario', compact('Labs'));

    }

    public function destroy(Request $request, $id)
    {
        PermissionLabController::destroy();
        $Laboratorio = Labs::find($id);
        $Laboratorio->delete();
        return back();

    }

    public function edit(Request $request, $id)
    {
        //  form para editar infos de um funcionario
        PermissionLabController::edit();
        $l = Labs::find($id);

        //   $m = DB::table('sis_medico_tem_especialidade')->where('sis_medico_funcionario_matricula', $p->matricula)->get();

        $l->clinica == 'M' ? $s = $l->laboratorio->especialidade : 's';
        /*
        foreach ($m as $m->Sis_especialidade_id => $espec) {
        $tt = $espec->Sis_especialidade_id;
        $s[] = Especialidade::find($tt);

        }*/

        $especialidades = Especialidade::all();
        $Permissao = $l->user->permission()->get();
        //dd($m);
        return view('laboratorio.editar', compact('p', 's', 'especialidades', 'Permissao'));
    }

    public function update(LaboratorioRequest $request, $id)
    {

        PermissionLabController::edit();

        $Laboratorio = Labs::find($id);
        $id1 = true;
        $id2 = true;
        $Laboratorio->update($request->all());
        if ($Laboratorio->clinica == 'M') {
            $Laboratorio->laboratorio->update($request->only('id'));
            $request->only('id1')['id1'] != null ? $especialidade[] = $request->only('id1')['id1'] : $id1 = null;
            $request->only('id2')['id2'] != null ? $especialidade[] = $request->only('id2')['id2'] : $id2 = null;

            $id1 == null && $id2 == null ? $Laboratorio->laboratorio->especialidade()->detach() : $Laboratorio->medico->especialidade()->sync($especialidade);
        }

        return redirect()->route('laboratorio.listar');
    }

    public function show(Request $request, $id)
    {
        //  form para editar infos de um paciente
        PermissionLabController::show();
        $l= Labs::find($id);

        return view('laboratorio.show')->with('l', $l);
    }
}


