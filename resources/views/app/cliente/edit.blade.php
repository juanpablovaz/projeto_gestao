@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editar cliente</p>
        </div>
        <div class="menu">
            <ul>
                
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                @component('app.cliente._components.form_create_edit', ['clientes'=>$clientes])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection