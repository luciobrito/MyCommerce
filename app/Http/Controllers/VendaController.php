<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\ProdutoVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function create(Request $request){
        $data = $request->validate([
            'data_venda' => 'date',
            'forma_pagamento' => '',
            'desconto',
            'itens'
        ]);
        
        if($venda = Venda::create($data))
        {
            foreach($request->itens as $item){
                Estoque::where('id_produto', $item['id_produto'])
                ->first()
                ->reduzir($item['quantidade']);
                ProdutoVenda::create([
                    'id_venda'=>$venda["id"],
                    'id_produto' => $item["id_produto"],
                    'quantidade' => $item["quantidade"]
                ]);
                
            }
        }
    }
    public function index(){
        $vendas = Venda::all();
        foreach($vendas as $venda){
            $venda['produtos'] = $venda->listaProdutos();
        }
        return $vendas;
    }
    
}
