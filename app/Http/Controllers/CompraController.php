<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate(
            [
                'data_compra' => 'date|required',
                'forma_pagamento' => 'required',
                'desconto',
                'itens' => 'array'
                ]
        );
        if($compra = Compra::create($data))
        {
            foreach($request->itens as $item){
                DB::table('produtos_compra')->insert([
                    'id_produto'=>$item["id_produto"],
                    'id_compra'=> $compra["id"],
                    'quantidade' => $item["quantidade"],
                    'valor_unitario' => $item["valor_unitario"]
                  ]);
                $estoque = Estoque::where('id_produto', '=',$item["id_produto"])->first();
                $novoValor = $estoque->quantidade += $item["quantidade"];
                $estoque->update(['quantidade' => $novoValor]);
                  $estoque->save();
            }
                  
           /* return response(var_dump($request));*/
        }
    }
}
