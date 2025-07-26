@extends('app.layouts.basico')

@section('title', 'Pedido-produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">

            <p>Adicionar produto ao pedido</p>


        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>Id do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do produto</th>
                            <th>Data de Criacao</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                                <td>{{ $produto->pivot->quantidade }}</td>
                                <td>
                                    <form
                                        action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido'=>$pedido->id]) }}"
                                        id="form_{{ $produto->pivot->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{$produto->pivot->id }}').submit()">Excluir</a>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>

@endsection
