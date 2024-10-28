<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Responses\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|numeric'
        ]);

        if($validator->fails()){
            return ApiResponse::error($validator->errors(), 'Os dados não são válidos!');
        }

        $customer = Produto::create($request->all());
        return ApiResponse::ok('Produto cadastrado com sucesso!', $customer);
    }


    public function listarTodos()
    {
        $customers = Produto::all();
        return ApiResponse::ok('Lista de Produtos', $customers);
    }

    public function listarPeloId(int $id)
    {
        $customer = Produto::findOrFail($id);
        return ApiResponse::ok('Produto: ', $customer);
    }

    public function editar(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'preco' => 'required|numeric'
        ]);

        if($validator->fails()){
            return ApiResponse::error($validator->errors(), 'Os dados não são válidos!');
        }

        $customer = Produto::findOrFail($id);
        $customer->update($request->all());

        return ApiResponse::ok( 'Produto atualizado com sucesso!', $customer);
    }


    public function remover(int $id)
    {
        $customer = Produto::findOrFail($id);
        $customer->delete();
        return ApiResponse::ok('Produto excluido com sucesso', $customer);
    }
}
