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
    public function view( $user, Funcionario $funcionario)
    {
        //
    }

    /**
     * Determine whether the user can create funcionarios.
     *
     * @param  \  $user
     * @return mixed
     */
    public function create( $user)
    {
        //
    }

    /**
     * Determine whether the user can update the funcionario.
     *
     * @param  \  $user
     * @param  \App\Funcionario  $funcionario
     * @return mixed
     */
    public function update( $user, Funcionario $funcionario)
    {
        //
    }

    /**
     * Determine whether the user can delete the funcionario.
     *
     * @param  \  $user
     * @param  \App\Funcionario  $funcionario
     * @return mixed
     */
    public function delete( $user, Funcionario $funcionario)
    {
        //
    }

    /**
     * Determine whether the user can restore the funcionario.
     *
     * @param  \  $user
     * @param  \App\Funcionario  $funcionario
     * @return mixed
     */
    public function restore( $user, Funcionario $funcionario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the funcionario.
     *
     * @param  \  $user
     * @param  \App\Funcionario  $funcionario
     * @return mixed
     */
    public function forceDelete( $user, Funcionario $funcionario)
    {
        //
    }


    public function editir(?User $user, Funcionario $funcionario){
        return session("user")->funcionario->Sis_funcionario_matricula === $funcionario->matricula;
    



    }
}
