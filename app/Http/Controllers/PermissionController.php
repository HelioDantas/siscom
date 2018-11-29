<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    


   public static function edit(Request $request)
    {
        //  form para editar infos de um funcionario
  
            if(!$request->session()->get("user")->permission()->where('permissao_id', 1)->get()->isEmpty())
                return true;
     
              abort(403,'Unauthorized');



    }

       public static function novo(Request $request)
        {
        //  form para editar infos de um funcionario
  
            if( !$request->session()->get("user")->permission()->where('permissao_id', 3)->get()->isEmpty())
                return true;
     
              abort(403,'Unauthorized');

    }

     public static function create(Request $request)
        {
        //  form para editar infos de um funcionario
  
            if( (!$request->session()->get("user")->permission()->where('permissao_id', 4)->get()->isEmpty()))
                return true;
     
              abort(403,'Unauthorized');

         }


         public static function show(Request $request)
        {
        //  form para editar infos de um funcionario
  
            if( (!$request->session()->get("user")->permission()->where('permissao_id', 5)->get()->isEmpty()))
                return true;
     
              abort(403,'Unauthorized');

         }

             public static function destroy(Request $request)
            {
        //  form para editar infos de um funcionario
  
            if( (!$request->session()->get("user")->permission()->where('permissao_id', 6)->get()->isEmpty()))
                return true;
     
              abort(403,'Unauthorized');

            }

}
