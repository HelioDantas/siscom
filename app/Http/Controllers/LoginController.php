<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(){
       return view('user.login');
   }

   protected $redirectTo = '/';
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

           session()->put('user', $user);

           return redirect()->route('dashboard');
       }

       return back()->withInput();
   }


   public function cad(){
       return view('cadastro');
   }

   public function logout(){

    Auth::logout();
    return redirect()->route('user.login');
}


protected function redirectTo()
{
    return redirect()->route('dashboard');
}

}
