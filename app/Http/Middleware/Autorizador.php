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
        if (!$request->session()->exists('user')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
