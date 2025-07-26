@extends('app.layouts.basico')

@section('title', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                {{-- {{ $produtos->toJson() }} --}}
                <table border="1" width=100%>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $cliente->id }}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{ $cliente->id}}').submit()">Excluir</a>
                                    </form>

                                </td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clientes->count() }} - Total de registros por página
                <br>
                {{ $clientes->total() }} - Total de registros da consulta
                <br>
                {{ $clientes->firstItem() }} - Retorna o numero do primeiro registro da página
                <br>
                {{ $clientes->lastItem() }} - Retorna o numero do ultimo registro da página
                <br>
                {{ $clientes->appends($request)->links() }}
                <br>


            </div>
        </div>
    </div>

@endsection
