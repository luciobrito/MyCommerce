<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoque';
    protected $fillable = ['id_produto', 'quantidade'];
    public function reduzir($valor){
        if($this->quantidade >= $valor){
            $novoValor = $this->quantidade - $valor;
            $this->update(['quantidade'=> $novoValor]);
            $this->save();
        }
        else throw new Exception("Não há estoque suficiente para esse produto");
    }
    public function aumentar($valor){
        $novoValor = $this->quantidade + $valor;
        $this->update(['quantidade' => $novoValor]);
        $this->save();
    }
}
