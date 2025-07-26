@if (isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente]) }}" method="POST">
        @csrf
        @method('put')
    @else
        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf
            
@endif

<input type="text" name="nome" class="borda-preta"  placeholder="Informe o nome"
    value="{{ $clientes->nome ?? old('nome') }}">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}


<button type="submit" class="borda-preta">Salvar</button>
</form>
