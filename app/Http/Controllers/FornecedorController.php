<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Validator;

class FornecedorController extends Controller
{
    //

    public function index () {

        

        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome','like','%'.$request->input('nome').'%')
        ->where('site','like','%'.$request->site.'%')
        ->where('uf','like','%'.$request->uf.'%')
        ->where('email','like','%'.$request->email.'%')
        ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
        //mandar request para o pagination

    }

    public function adicionar(Request $request){

        $msg = '';

        //inclusao
        if($request->input('_token') != '' && $request->input('id') == ''){
            //iniciar cadastro
            $regras = [
                'nome' => 'required|min:3|max:40',
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
                'email.email' => 'O campo email deve ser um endereço de e-mail válido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());
            
            //redirect
            $msg = 'Cadastro realizado com sucesso';

        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = "Fornecedor atualizado com sucesso";
            }else{
                $msg = "Inconcistência";
            }

            return redirect()->route('app.fornecedor.editar', ['id'=> $request->input('id'),'msg' => $msg]);

        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        
        //recuperar dados desse fornecedor que sera editado
        // na view, devemos implementar a recuperacao desses dados
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor, 'msg'=>$msg]);

    }
}
