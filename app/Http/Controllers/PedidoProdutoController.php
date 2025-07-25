<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        //
        $produtos = Produto::all();
        //$pedido->produtos; //eager loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute e obrigatorio',
            'produto_id.exists' => 'O produto informado não existe'
        ];

        $request->validate($regras, $feedbacks);
        /*
        $pedidoproduto = new PedidoProduto();
        $pedidoproduto->pedido_id = $pedido->id;
        $pedidoproduto->produto_id = $request->get('produto_id');
        $pedidoproduto->quantidade = $request->get('quantidade');
        $pedidoproduto->save();
        */
        //$pedido->produtos // os registros do relacionamento
        //$pedido->produtos() // objeto
        //$pedido->produtos()->attach(<id_produto>, <valores que vao ser guardados no relacionamento>)
        /*
        $pedido->produtos()->attach(
            $request->get('produto_id'),
            [
                'quantidade' => $request->get('quantidade')
            ]
        );
        */ //objeto
        //caso tivessemos um prontend mais complexo que aceita adicionar mais de um produto de uma vez, podemos fazer assim:
        $pedido->produtos()->attach(
            [
                $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
            ]
        );
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, Pedido $pedido)
    {
        //
        // print_r($pedido->getAttributes());
        // echo '</br>';
        // print_r($produto->getAttributes());
        
        //convencional

        // print_r($pedido->id. '_'.$produto->id);
        // PedidoProduto::where(
        //     [
        //         'pedido_id' => $pedido->id,
        //         'produto_id' => $produto->id
        //     ]
        // )->delete();
        //novo
        //detach -> remove os registros com base no metodo

        // $pedido->produtos()->detach(
        //     $produto->id
        // );

        //para nao destruir todos fazemos pelo identificador
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);


    }
}
