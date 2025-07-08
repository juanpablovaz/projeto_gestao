<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    //
    public function contato(Request $request){
        
        $motivo_contatos = MotivoContato::all();

        return view('site.contato' , ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
        //$contato = new SiteContato();
        //$contato->fill($request->all());
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */
        //echo '<pre>';
        //print_r($contato->getAttributes());
        //echo '</pre>';

        //$contato->save();
        
        
        
    }

    public function salvar(Request $request){

        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ],
    [
        'nome.required' => 'O nome é obrigatório'
    ]);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
