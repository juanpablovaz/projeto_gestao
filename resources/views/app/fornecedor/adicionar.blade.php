@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form action="{{route('app.fornecedor.adicionar')}}" method="POST">
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Informe o nome">
                    <input type="text" name="site" class="borda-preta" placeholder="Informe o site">
                    <input type="text" name="uf" class="borda-preta" placeholder="Informe o uf">
                    <input type="text" name="email" class="borda-preta" placeholder="Informe o email">
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>

@endsection