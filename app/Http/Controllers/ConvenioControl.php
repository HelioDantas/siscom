<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Convenio;

class ConvenioControl extends Controller
{
        public function novo()
        {
            return view ('convenio.formularioconvenio');
        }

        public function create(Request $request){
        
            $sis_convenio = Convenio::create($request->all());
     
            return view('layout.app'); 

      {

        public function alterar(Request $request){
        
            $sis_convenio = Convenio::alterar($request->all());
     
            return view('layout.app'); 
    } 
}