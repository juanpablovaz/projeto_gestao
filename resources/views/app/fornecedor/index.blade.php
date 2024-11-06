<h3>Fornecedor</h3>



@isset($fornecedores)
    
    @forelse($fornecedores as $fornecedor)

        Iteracao Atual: {{ $loop->iteration }}
        <br>
        Fornecedor:: {{ $fornecedor['nome'] }}
        </br>
        Status:: {{ $fornecedor['status'] }}
        <br>
        CNPJ:: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Contato:: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
        primeira iteracao
        @endif
        <br>
        @if($loop->last)
        Ultima iteracao
        @endif
        <br>
        Total de Iteracoes: {{ $loop->count }}
        <hr>
        
        @empty
            Vazio
    @endforelse

@endisset
