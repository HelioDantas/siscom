<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{


    public function novo(Request $request){

        if (array_key_exists ('referer', $request->header()))  // return dd (strpos($request->header()['referer'][0], 'funcionario/create'));
    {
             $Permissao = Permission::all();
              return view('user.novo',compact('Permissao'));



    }else

         abort(403, 'Não autorizado');
    }

      public function create(UserRequest $request){


        if($request['senha'] != $request['senha2'])
            return redirect()->back()->withInput();

        $request['senha'] = password_hash($request['senha'],1);

        $User = User::Create([
                'Sis_funcionario_matricula' => $request['matricula'],
                'cpf' => $request['cpf'],
                'senha' => $request['senha'],
                'dicaSenha' => $request['dicaSenha'],

        ]);

        $Permissao = $request->only('$p');
        foreach($Permissao as $p){
        $User->permission()->attach($p);
        }
     //   return var_dump($sis_funcionario);

       return redirect()->route('funcionario.listar')->withInput();
       // return redirect()->action('UserController@novo')->with('func', $sis_funcionario);



      }

      public function recoveryForm(){

        return view('user.recovery');
      }

      public function recovery(Request $request){

        $user = User::buscar($request['email']);
        if (isset($user)) {
          // gerar nova senha , inserir no db e enviar nova senha para o usuario.



        }else{
          return redirect()->back();
        }
      }


         public function permissoes(Request $request, $id){

//            return dd($id);

             $user = User::where('Sis_funcionario_matricula', $id)->first();
             $Permissao = $user->permission()->get();
              return view('administrador.editi',compact('Permissao', 'id'));





    }
      public function newPermissoes(Request $request, $id){

//            return dd($id);

             $user = User::where('Sis_funcionario_matricula', $id)->first();
             $ListP = Permission::join('sis_usuario_tem_permissao', 'permissao_id', "=", 'id')->where( 'usuario_id', "=", $user->id)->pluck('permissao_id');
              $Permissao = Permission::whereNotIn('id', $ListP)->paginate(10);

       
              return view('administrador.create',compact('Permissao', 'id'));

               
            
        
  
          
          ///redirect()->route('User.createPermissoes', ['id' => $medico_id]);




    }


       public function createPermissoes(Request $request, $id, $user_id){

//  


       //  return dd($id);

             $user = User::where('Sis_funcionario_matricula', $user_id)->first();
             $Permissao = $user->permission()->get();
              $dd = User::find($user->id)->permission()->attach($id);
            
        
          return back();
          
          ///redirect()->route('User.createPermissoes', ['id' => $medico_id]);




    }

    public function destroyPermissoes(Request $request, $id, $user_id){

//            return dd($id);

             $user = User::where('Sis_funcionario_matricula', $user_id)->first();
             $Permissao = $user->permission()->get();
         

                 $dd = User::find($user->id)->permission()->detach($id);
            
        
          return back();
          
          ///redirect()->route('User.createPermissoes', ['id' => $medico_id]);




    }


}
