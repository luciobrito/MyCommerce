<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';
    protected $fillable =['data_venda','forma_pagamento','desconto'];
    public function listaProdutos(){
        return $this->select('produtos.nome')
        ->join('produtos_venda', 'venda.id', '=', 'produtos_venda.id_venda')
        ->join('produtos','produtos.id','=','produtos_venda.id_produto')
        ->where('venda.id',$this->id)
        ->get();
    }
}
