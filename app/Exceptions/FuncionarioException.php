<?php

namespace App\Exceptions;

use Exception;

class FuncionarioException extends Exception
{
    
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(QueryException $exception)
    {
       if ($exception instanceof QueryException ) {
                 return parent::report($exception->getMessage());
        
        }

    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request, QueryException $exception)
    {
         if ($exception instanceof QueryException) {
        return response()->view('errodfdsrs.cum', [], 500);
        }


        return response("...");
    }
}



  