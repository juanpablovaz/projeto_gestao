<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //

    public function index () {

        

        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){

        if($request->input('_token') != ''){
            //iniciar cadastro
            $regras = [
                'nome' => 'request|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'site.required' => 'O campo site é obrigatório',
                'uf.required' => 'O campo uf é obrigatório',
                'uf.min' => 'O campo uf deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email' => 'email'
            ];

            $request->validate($regras, $feedback);

            

            

        }

        return view('app.fornecedor.adicionar');
    }
}
