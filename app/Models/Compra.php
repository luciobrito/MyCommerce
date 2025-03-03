<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Compra extends Model
{
    protected $fillable = ['data_compra','forma_pagamento','desconto', 'produtos','abc123'];
    protected $table = 'compra';
    public function produtos() : BelongsToMany
    {
        return $this->belongsToMany(Produto::class, 'produtos_compra', 'id_compra', 'id_produto');
    }
    //Mostra todas as compras junto com os nomes dos produtos
    public static function showAll()
    {
        $compras = Compra::all();
        foreach($compras as $compra)
        {
            $compra["produtos"] = $compra->select('produtos.nome','produtos_compra.quantidade','produtos_compra.valor_unitario')
            ->join('produtos_compra', 'compra.id','=','produtos_compra.id_compra')
            ->join('produtos', 'produtos.id', '=', 'produtos_compra.id_produto')
            ->where('compra.id', $compra->id)
            ->get();
        }
        return $compras;
    }
}
