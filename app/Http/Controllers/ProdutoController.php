<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function create(Request $request){
        $data = $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'codigo_barra' => 'required',
            'descricao' => 'required',
        ]);
        if($produto = Produto::create($data)){
            //Trocar a coluna na tabela para default = 0
            Estoque::create(['id_produto'=>$produto['id'], 'quantidade' => 0]);
            return response('Criado com sucesso',201);
        }
    }
    public function getAll(){
        return Produto::all();
    }
    public function edit(Request $request){

    }
    //Soft delete
    public function delete(){

    }
}
