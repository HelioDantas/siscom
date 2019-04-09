<?php

namespace App\Policies;

use ;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function editir(?User $user, Post $post){
        return $user->id === $post->user_id;
    



    }

}
