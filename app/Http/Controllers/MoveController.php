<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ConvenioController;


class MoveController extends Controller
{
     public function list($id)
    {
        $convenio = Convenio::list($id);
        $convenio ->listar($request->all());
        return redirect()->route('convenio.listar');
    }
    public function editar(Convenio $id)
    {
        $convenio = Convenio::edit($id);
        $convenio ->editar($request->all());
        return redirect()->route('\layouts\convenio.editar');
    }
    public function pesq($id)
    {
        $convenio = Convenio::pesq($id);
        $convenio ->pesquisar($request->all());
        return redirect()->route('convenio.pesquisar');
    }
     public function update(Request $request, $id)
    {
        $convenio = Convenio::find($id);
        $convenio->update($request->all());
            return redirect()->route('convenio.editar');
    }
    
    public function destroy($id)
    {
        //
    }
}
