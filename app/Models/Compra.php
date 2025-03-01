<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Compra extends Model
{
    protected $fillable = ['data_compra','forma_pagamento','desconto'];
    protected $table = 'compra';
    public function produtos() : BelongsToMany
    {
        return $this->belongsToMany(Produto::class, 'produtos_compra', 'id_compra', 'id_produto');
    }
}
