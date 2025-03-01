<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco','codigo_barra','descricao'];
    public function estoque(){
        return $this->hasOne(Estoque::class,'id_produto','id');
    }
}
