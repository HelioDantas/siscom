<?php

namespace App\Http\Controllers;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Labs;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\LaboratorioRequest;


class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorio = Labs::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('laboratorio.listar' , compact('laboratorio'));
    }

    public function listar()
    {
        //listar laboratorio
     
        $laboratorio = Laboratorio::where('nome', $nome)->get();
        $laboratorio = Laboratorio::orderBy('id')->paginate(10);
        return view('laboratorio.listar' , compact('laboratorio'));
        //testando
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sis_laboratorio = Laboratorio::create($request->all());
        return redirect()->action('LaboratorioController@create'); 
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
    public function edit($id)
    {
        $laboratorio = Laboratorio::find($id);
        return view('laboratorio.editar' , compact('laboratorio'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratorioRequest $request, $id)
    {
        $laboratorio = Laboratorio::find($id);
        $laboratorio->update($request->all());
            return redirect()->route('laboratorio.listar');
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
        $laboratorio = Laboratorio::find($id);
        $laboratorio->delete();
        return back();
    }
}


/*
class LaboratorioController extends Controller
{

    function index(){
        $laboratorio = Labs::where('id','!=', 4)->orderBy('nome')->paginate(10);
        return view('laboratorio.listar' , compact('laboratorio'));
    }

        function editar($id){

        $laboratorio = Laboratorio::find($id);

    

        return view('laboratorio.editar' , compact('laboratorio'));

        }
    
      public function novo($id){

            $laboratorio = Laboratorio::find($id);
            return view ('laboratorio.novo');
        }

        public function create(LaboratorioRequest $request){
            $sis_laboratorio = Laboratorio::create($request->all());
          
            return redirect()->action('LaboratorioController@index'); 

       }

        public function update(LaboratorioRequest $request, $id){
            $laboratorio = Laboratorio::find($id);
            $laboratorio->update($request->all());
                return redirect()->route('laboratorio.listar');


        }
}
