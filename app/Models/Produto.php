<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //use SoftDeletes;
    protected $fillable = ['nome', 'preco','codigo_barra','descricao'];
    public function estoque(){
        return $this->hasOne(Estoque::class,'id_produto','id');   
    }
    public function qntEstoque(){
        return $this->select('estoque.quantidade')
        ->join('estoque', 'produtos.id', '=', 'estoque.id_produto')
        ->where('produtos.id',$this->id)
        ->first();

    }
}
