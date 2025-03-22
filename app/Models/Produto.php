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

    public static function findAll(int $id){
        $produto = static::find($id);
        $qnt_estoque = $produto->estoque()->value('quantidade');
        $produto["qnt_estoque"] = $qnt_estoque;
        return $produto;
    }

 /*
    public function qntEstoque(){
        return $this->select('estoque.quantidade')
        ->join('estoque', 'produtos.id', '=', 'estoque.id_produto')
        ->where('produtos.id',$this->id)
        ->first();

    }*/
}
