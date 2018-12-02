<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{



   public static function edit()
    {
        //  form para editar infos de um funcionario

            if(!session()->get("user")->permission()->where('permissao_id', 1)->get()->isEmpty())
                return true;

                return abort(403, 'Não autorizado');




    }


   public static function update()
    {
        //  form para editar infos de um funcionario

            if(!session()->get("user")->permission()->where('permissao_id', 2)->get()->isEmpty())
                return true;

                return abort(403, 'Não autorizado');




    }

       public static function novo()
        {
        //  form para editar infos de um funcionario

            if( !session()->get("user")->permission()->where('permissao_id', 3)->get()->isEmpty())
                return true;

                return abort(403, 'Não autorizado');

    }

     public static function create()
        {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 4)->get()->isEmpty()))
                return true;

                return abort(403, 'Não autorizado');

         }


         public static function show()
        {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 5)->get()->isEmpty()))
                return true;

                return abort(403, 'Não autorizado');

         }

             public static function destroy()
            {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 6)->get()->isEmpty()))
                return true;

                return abort(403, 'Não autorizado');

            }




               public static function pedit(Request $request)
    {
        //  form para editar infos de um funcionario

            if(!$request->session()->get("user")->permission()->where('permissao_id', 7)->get()->isEmpty())
                return true;

              //abort(403,'Não autorizado');
             return 0;


    }

   public static function pupdate(Request $request)
    {
        //  form para editar infos de um funcionario

            if(!$request->session()->get("user")->permission()->where('permissao_id', 8)->get()->isEmpty())
                return true;

               return 0;




    }


       public static function pnovo(Request $request)
        {
        //  form para editar infos de um funcionario

            if( !$request->session()->get("user")->permission()->where('permissao_id', 9)->get()->isEmpty())
                return true;

                return 0;

    }

     public static function pcreate(Request $request)
        {
        //  form para editar infos de um funcionario

            if( (!$request->session()->get("user")->permission()->where('permissao_id', 10)->get()->isEmpty()))
                return true;

                return 0;

         }


         public static function pshow(Request $request)
        {
        //  form para editar infos de um funcionario

            if( (!$request->session()->get("user")->permission()->where('permissao_id', 11)->get()->isEmpty()))
                return true;

                return 0;

         }

             public static function pdestroy(Request $request)
            {
        //  form para editar infos de um funcionario

            if( (!$request->session()->get("user")->permission()->where('permissao_id', 12)->get()->isEmpty()))
                return true;

                return 0;

            }

}
