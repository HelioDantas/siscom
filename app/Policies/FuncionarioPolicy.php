<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the funcionario.
     *
     * @param  \  $user
     * @param  \App\Funcionario  $funcionario
     * @return mixed
     */
    public static function edit()
    {
        //  form para editar infos de um funcionario

            if(!session()->get("user")->permission()->where('permissao_id', 1)->get()->isEmpty())
                return true;

               return 0;




    }


   public static function update()
    {
        //  form para editar infos de um funcionario

            if(!session()->get("user")->permission()->where('permissao_id', 2)->get()->isEmpty())
                return true;

               return false;




    }

       public static function novo()
        {
        //  form para editar infos de um funcionario

            if( !session()->get("user")->permission()->where('permissao_id', 3)->get()->isEmpty())
                return true;

            return false;

    }

     public static function create()
        {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 4)->get()->isEmpty()))
                return true;

               return 0;

         }


         public static function show()
        {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 5)->get()->isEmpty()))
                return true;

               return false;

         }

             public static function destroy()
            {
        //  form para editar infos de um funcionario

            if( (!session()->get("user")->permission()->where('permissao_id', 6)->get()->isEmpty()))
                return true;

               return false;

            }

}
