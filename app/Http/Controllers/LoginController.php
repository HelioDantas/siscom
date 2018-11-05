<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(){
       return view('user.login2');
   }


   public function auth(Request $request)
   {
      // $credentials = $request->only('cpf', 'password');
     // dd($request->all());

       if (Auth::attempt([
           'cpf' => $request->cpf,
           'password' => $request->password,
       ])) {
           $user = Auth::user();
           $id = Auth::id();
           
           Session::put('user_id', $id);

           return redirect()->route('dashboard');
       }

       return back()->withInput();
   }


   public function cad(){
       return view('cadastro');
   }
}
