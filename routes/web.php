<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return response()->json(['message'=>'Hello World!!']);
});

