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

    public function index()
    {
        $procedimentoclinico = Proceds::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('procedimentoclinico.listar' , compact('procedimentoclinico'));
    }

    public function listar()
    {
        //listar procedimentoclinico

        $procedimentoclinico = Procedimentoclinico::where('nome', $nome)->get();
        $procedimentoclinico = Procedimentoclinico::orderBy('id')->paginate(10);
        return view('procedimentoclinico.listar' , compact('procedimentoclinico'));
        //testando
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sis_proced_clinico = Procedimentoclinico::create($request->all());
        return redirect()->action('ProcedimentoclinicoController@create'); 
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)//metodos com envio de post, path ou delete
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $laboratorio = Procedimentoclinico::find($id);
        return view('procedimentoclinico.editar' , compact('procedimento'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(ProcedimentoclinicoRequest $request, $id)
    {
        $procedimentoclinico = Procedimentoclinico::find($id);
        $procedimentoclinico->update($request->all());
            return redirect()->route('procedimentoclinico.listar');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PermissionController::destroy();
        $procedimentoclinico = Procedimentoclinico::find($id);
        $procedimentoclinico->delete();
        return back();
    }
}












    /*

    function index(){
        $procedimentoclinico = Proceds::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('procedimentoclinico.listar' , compact('procedimentoclinico'));
    }

        function editar($id){

        $procedimentoclinico = Procedimentoclinico::find($id);

    

        return view('procedimentoclinico.editar' , compact('procedimentoclinico'));

        }
    
      public function novo(){
        $laboratorio = Laboratorio::find($id);
        return view ('procedimentoclinico.novo');
        }

        public function create(ProcedimentoclinicoRequest $request){
            $sis_proced_clinico = Procedimentoclinico::create($request->all());
          
            return redirect()->action('procedimentoclinicoController@index'); 

       }

        public function update(ProcedimentoclinicoRequest $request, $id){
            $procedimentoclinico = Procedimentoclinico::find($id);
            $procedimentoclinico->update($request->all());
                return redirect()->route('procedimentoclinico.listar');

        }*/