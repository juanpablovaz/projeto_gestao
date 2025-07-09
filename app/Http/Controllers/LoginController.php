<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index(Request $request) {

        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Usuario e ou senha não existe!';
        };

        if($request->get('erro')== 2){
            $erro = 'Erro! Necesario fazer login';
        };
        

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);

    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $msgs = [
            'usuario.email' => 'Email obrigatorio',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $msgs);

        //recuperamos os parametros do usuario
        $email = $request->get('usuario');
        $senha = $request->get('senha');

        //iniciar o Model User
        $user = new User();

        $usuario = $user->where('email',$email)
                            ->where('password',$senha)
                            ->get()
                            ->first();

        if(isset($usuario->name)){

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            
            return redirect()->route('app.cliente');
        }else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair(){
        
        session_destroy();
        return redirect()->route('site.index');
    }
}
