<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index() {
        return view('site.login', ['titulo' => 'login']);
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

        $email = $request->get('usuario');
        $senha = $request->get('senha');

        

        $request->validate($regras, $msgs);


    }
}
