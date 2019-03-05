<?php

namespace projetoUsuario\Http\Controllers;

use projetoUsuario\Http\Controllers\Controller;

use projetoUsuario\Usuario;
use Illuminate\Support\Facades\DB;
use Auth;
use Request;



class LoginController extends Controller
{

    public function form(){

        return view('usuario.form_login');

    }


    public function login(){



    $credenciais = Request::only('email', 'password');

    if(Auth::attempt($credenciais)) {
        
        return "Usuário NOME logado com sucesso";
    }

    return "As credencias não são válidas";




    // {

    //      $usuario = new Usuario();
    //      $usuario->email = Request::input('email');
    //      $usuario->password = Request::input('password');

        
    //      $dados = Usuario::where('email', $usuario->email)->first();

    //      $resultado = "";

    //      if(empty($dados)){

    //          $resultado = "Não Existe Usuario";

    //      } else {

    //         if($usuario->password == $dados->password) {


    //              $resultado = "Usuario Existe Logo pode se logar";

    //        }
    //     }

    //     return($resultado);

    // }

    }
}