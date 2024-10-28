<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/vendedor', [VendedorController::class, 'listarTodos']);
Route::get('/vendedor/{id}', [VendedorController::class, 'listarPeloId']);
Route::post('/vendedor', [VendedorController::class, 'criar']);
Route::put('/vendedor/{id}', [VendedorController::class, 'editar']);
Route::delete('/vendedor/{id}', [VendedorController::class, 'remover']);


Route::get('/produto', [ProdutoController::class, 'listarTodos']);
Route::get('/produto/{id}', [ProdutoController::class, 'listarPeloId']);
Route::post('/produto', [ProdutoController::class, 'criar']);
Route::put('/produto/{id}', [ProdutoController::class, 'editar']);
Route::delete('/produto/{id}', [ProdutoController::class, 'remover']);


