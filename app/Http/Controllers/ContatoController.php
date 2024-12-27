<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    //
    public function contato(){
        
        //$contato = new SiteContato();
        //$contato->fill($request->all());

        //echo '<pre>';
        //print_r($contato->getAttributes());
        //echo '</pre>';

        //$contato->save();
        
        return view('site.contato' , ['titulo' => 'Contato']);
    }

    public function salvar(Request $request){

        SiteContato::create($request->all());
    }

}
