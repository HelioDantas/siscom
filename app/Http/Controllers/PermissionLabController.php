<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionLabController extends Controller
{

   public static function edit()
    {
        //  form para editar infos de um funcionario

            if(!session()->get("user")->permission()->where('permissao_id', 1)->get()->isEmpty())
                return true;

                return abort(403, 'Não Aceito');

    }


   public static function update()
    {
        //  form para editar infos de um funcionario

            if(!session()->get("user")->permission()->where('permissao_id', 2)->get()->isEmpty())
                return true;

                return abort(403, 'Não aceito');

    }

       public static function cad()
        {
        //  form para editar infos de um funcionario

            if( !session()->get("user")->permission()->where('permissao_id', 3)->get()->isEmpty())
                return true;

                return abort(403, 'Não aceito');

    }

     public static function create()
        {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 4)->get()->isEmpty()))
                return true;

                return abort(403, 'Não aceito');

         }


         public static function show()
        {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 5)->get()->isEmpty()))
                return true;

                return abort(403, 'Não aceito');

         }

             public static function destroy()
            {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 6)->get()->isEmpty()))
                return true;

                return abort(403, 'Não aceito');

            }

               public static function ledit(Request $request)
    {
        //  form para editar infos de um funcionario

            if(!$request->session()->get("user")->permission()->where('permissao_id', 7)->get()->isEmpty())
                return true;

              //abort(403,'Não autorizado');
              return abort(403, 'Não aceito');


    }

   public static function lupdate(Request $request)
    {
        //  form para editar infos de um funcionario

            if(!$request->session()->get("user")->permission()->where('permissao_id', 8)->get()->isEmpty())
                return true;

                return abort(403, 'Não aceito');

    }

       public static function lcad(Request $request)
        {
        //  form para editar infos de um funcionario

            if( !$request->session()->get("user")->permission()->where('permissao_id', 9)->get()->isEmpty())
                return true;

                return abort(403, 'Não aceito');

    }

     public static function lcreate(Request $request)
        {
        //  form para editar infos de um funcionario

            if( (!$request->session()->get("user")->permission()->where('permissao_id', 10)->get()->isEmpty()))
                return true;

                return abort(403, 'Não aceito');

         }


         public static function lshow(Request $request)
        {
        //  form para editar infos de um funcionario

            if( (!$request->session()->get("user")->permission()->where('permissao_id', 11)->get()->isEmpty()))
                return true;

                return abort(403, 'Não aceito');

         }

             public static function ldestroy(Request $request)
            {
        //  form para editar infos de um funcionario

            if( (!$request->session()->get("user")->permission()->where('permissao_id', 12)->get()->isEmpty()))
                return true;

                return abort(403, 'Não aceito');

            }

}
