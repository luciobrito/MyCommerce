<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoCompra extends Model
{
    protected $fillable = ['id_produto','id_compra', 'quantidade','valor_unitario'];
    protected $table = 'produtos_compra';
}
