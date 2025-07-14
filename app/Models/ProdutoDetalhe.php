<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $table = 'produto_detalhes';

    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
