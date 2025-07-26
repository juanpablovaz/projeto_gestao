<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedor_id'
    ];

    //1 - 1 : 1 registro relacionado em produto_detalhes(fk) -> produto_id
    public function produtoDetalhe(){
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos')->withPivot('created_at', 'quantidade');

         /*
        caso esteja o model teha um nome diferente, fica dessa forma:
            1 - modelo do relacionamento NxN em relação ao modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
            4 - representa o nome da fk da tabela mapeada pelo model utilizada no relacionamento que estamos implementando
        return $this->BelongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id')
        */
    }
}
