@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="POST">
        @csrf
        @method('put')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="POST">
            @csrf
@endif
<input type="text" name="produto_id" class="borda-preta" placeholder="Id do produto"
    value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
<input type="text" name="comprimento" class="borda-preta" placeholder="comprimento do produto"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
<input type="text" name="largura" class="borda-preta" placeholder="largura do produto"
    value="{{ $produto_detalhe->largura ?? old('largura') }}">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}
<input type="text" name="altura" class="borda-preta" placeholder="altura do produto"
    value="{{ $produto_detalhe->altura ?? old('altura') }}">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}
<select name="unidade_id">
    <option>-- Selecione a Unidade --</option>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach

</select>

<button type="submit" class="borda-preta">Salvar</button>
</form>
