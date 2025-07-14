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
}
