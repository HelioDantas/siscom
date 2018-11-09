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

        $request['senha'] = password_hash($request['senha'],1);
        
        $User = User::Create($request->all());
     //   return var_dump($sis_funcionario);
        
       return view('layout.app');
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);



      }



}
