<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConvenioController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function novo(){
            return view ('convenio.formularioconvenio');
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sis_convenio = Convenio::create($request->all());
          
        return view('layout.app');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $convenio = Convenio::list($id);
        $convenio ->listar($request->all());
        return redirect()->route('convenio.listar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $convenio = Convenio::edit($id);
        $convenio ->editar($request->all());
        return redirect()->route('convenio.editar');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pesq($id)
    {
        $convenio = Convenio::pesq($id);
        $convenio ->pesquisar($request->all());
        return redirect()->route('convenio.pesquisar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $convenio = Convenio::find($id);
        $convenio->update($request->all());
            return redirect()->route('convenio.editar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
