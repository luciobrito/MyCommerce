<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate(
            [
                'data_compra' => 'date|required',
                'forma_pagamento' => 'required|alpha',
                'desconto' => 'numeric',
                'itens' => 'array|present', //present
                'itens.*.quantidade' => 'required|integer',
                'itens.*.valor_unitario' => 'required|numeric'
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
                Estoque::where('id_produto', '=',$item["id_produto"])
                ->first()
                ->aumentar($item["quantidade"]);
            }
                  
        }
    }
    public function index(){
        $compras = Compra::all();
        foreach($compras as $compra)
        {
            $compra['produtos'] = $compra->listaProdutos();
        }
        return $compras;
    }
}
