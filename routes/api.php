<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/produto',[ProdutoController::class,'create']);
Route::get('/produto',[ProdutoController::class,'getAll']);
Route::post('/compra', [CompraController::class,'create']);