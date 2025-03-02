<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    protected $table = 'produtos_venda';
    protected $fillable = ['id_venda','id_produto','quantidade'];
    
}
