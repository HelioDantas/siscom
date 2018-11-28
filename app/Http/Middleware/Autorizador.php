<?php

namespace App\Http\Middleware;

use Closure;

class Autorizador
{
    /**
     * 
     *
     *
     */
    public function handle($request, Closure $next)

    {

        if ($request->session()->exists('user') ) {
            if($request->is('/login')){
                return redirect('dashboard');
            }else{
            return $next($request);

            }
        }
        return redirect('/login');
    }

}