@extends('app.layouts.basico')

@section('title', 'Pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar pedido</p>
        </div>
        <div class="menu">
            <ul>
                
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                @component('app.pedido._components.form_create_edit', ['pedido'=>$pedido])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection