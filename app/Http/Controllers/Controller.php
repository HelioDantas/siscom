<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        /**
         * Return view the homepage of system
         * 
         * @return void
         */
        return view ('');
        echo "pagina do sistema";
    }


    /**
     * return view of login to user
     * 
     * @return view
     */
    public function fazerLogin()
    {
        return view ('user.login');
    
    }
}
