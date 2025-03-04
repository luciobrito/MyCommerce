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
            'nome' => 'required',
            'preco' => 'required|numeric',
            'codigo_barra' => 'required|unique:produtos',
            'descricao' => 'required',
        ];
        $data = Validator::make($request->all(),$rules,[],Atributos::$atrb)->validate();
        if($produto = Produto::create($data)){
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
