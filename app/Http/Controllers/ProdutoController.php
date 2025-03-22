<?php

namespace App\Http\Controllers;

use App\Http\Validators\Atributos;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function create(Request $request){
        $rules = [
            'nome' => 'required|max:30',
            'preco' => 'required|numeric',
            'codigo_barra' => 'required|unique:produtos|numeric|max:9|min:9',
            'descricao' => 'required|max|60',
        ];
        $data = Validator::make($request->all(),$rules,[],Atributos::$atrb)->validate();
        if($produto = Produto::create($data)){
            Estoque::create(['id_produto'=>$produto['id'], 'quantidade' => 0]);
            return response(['message'=> 'Produto criado com sucesso.'],201);
        }
    }
    public function getAll(){
        //Tentar fazer de um jeito melhor
        $produtos = Produto::orderByDesc('created_at')->get();
        foreach($produtos as $produto)
        {
            $produto['qnt_estoque'] = $produto->estoque()->value('quantidade');
        }
        return $produtos;
    }
    public function edit(Request $request){
        
    }
    //Soft delete depois
    public function delete($id){
        $estoque = Estoque::where('id_produto', $id)->first();
        $estoque->delete();
        $produto = Produto::find($id);
        $produto->delete();
        return response(['message'=> 'Produto deletado com sucesso!'],200);
    }
    public function getById($id){
        if($produto = Produto::findAll($id))
            return $produto;
        else return response(['message'=>'Produto não encontrado'], 404);
    }
}
