<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Estoque;
use App\Models\Produto;
use App\Models\ProdutoCompra;
use App\Models\Venda;
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
                Estoque::where('id_produto', '=',$item["id_produto"])
                ->first()
                ->aumentar($item["quantidade"]);
            }
                  
           /* return response(var_dump($request));*/
        }
    }
    public function index(){
        $lista = array();
        $compras = Compra::all();
        foreach($compras as $compra){
            $obj = [
                'Compra' => $compra,
                'Produtos' => ProdutoCompra::where('id_compra',3)
                ->join('compra','compra.id', '=', 'produtos_compra.id_compra')
                ->get()
            ];
            array_push($lista, $obj);
        }
        return $lista; 
    }
}
