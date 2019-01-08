<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Convenio;
use App\Models\Plano;
USE Illuminate\Support\Facades\DB;
class PlanoController extends Controller
{
    /*function create(Request $request,$id){
        dd($request);
        $convenio = Convenio::find($request[$id]);
        $plano = Plano::create($request->all());

        return redirect()->back();
    }*/

    function destroy($id){

    }

    function assocPlano(Request $request){


        if($request['inativo_id'] == null  && !empty($request['inativo_id'])){

            $plano = Plano::create($request->all());

        }else if($request['inativo_id'] !== null  && !empty($request['inativo_id'])){
            DB::table('sis_plano')->where('id',$request['inativo_id'])->update(['status'=> 'ATIVO']);

        }

        return redirect()->back();

    }

    function assocDelete($id){
      //  Plano::find($id)->update(['status'=> 'INATIVO']);

     //return dd(  $plano->update(['status' => 'INATIVO']));
        DB::table('sis_plano')->where('id',$id)->update(['status'=> 'INATIVO']);

        return redirect()->back();
    }


}
