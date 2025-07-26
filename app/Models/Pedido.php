<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'cliente_id'
    ];

    public function produtos(){
        return $this->BelongsToMany(Produto::class, 'pedidos_produtos')->withPivot('created_at', 'quantidade', 'id');
        /*
        caso esteja o model teha um nome diferente, fica dessa forma:
            1 - modelo do relacionamento NxN em relação ao modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
            4 - representa o nome da fk da tabela mapeada pelo model utilizada no relacionamento que estamos implementando
        return $this->BelongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')
        */
    }
}
