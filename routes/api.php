<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/produto',[ProdutoController::class,'create']);
Route::get('/produto',[ProdutoController::class,'getAll']);
Route::delete('/produto/{id}', [ProdutoController::class, 'delete']);
Route::get('/produto/{id}',[ProdutoController::class, 'getById']);
Route::post('/compra', [CompraController::class,'create']);
Route::get('/compra', [CompraController::class,'index']);

Route::post('/venda', [VendaController::class,'create']);
Route::get('/venda', [VendaController::class,'index']);