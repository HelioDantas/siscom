<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function novo(){

        return view('user.novo');
    }


      public function create(Request $request){
        
        $User = User::create($request->all());
     //   return var_dump($sis_funcionario);
        
       return view('layout.app');
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);



    }

public function alterar(Request $request){
        
        $User = User::alterar($request->all());
     //   return var_dump($sis_funcionario);
        
       return view('layout.app');

}
