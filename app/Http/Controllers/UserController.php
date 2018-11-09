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
        return view('layout.app');
       
    }

}
