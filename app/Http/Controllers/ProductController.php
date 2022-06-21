<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, ProductRequest $request)
    {
        $product = Product::create([
            'campaign_id'       => $id,
            'nome_produto'      => $request->nome_produto,
            'descricao_produto' => $request->descricao_produto,
            'preco_produto'     => $request->preco_produto
        ]);

        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $product = Product::findOrFail($id);

            return response()->json($product, 200);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do produto não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {

            $product = Product::findOrFail($id);
            $product->update($request->all());

            return response()->json($product, 200);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do produto não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $product = Product::findOrFail($id);
            $product->delete($id);

            return response()->json(['sucess' => 'Produto excluído com sucesso']);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do produto não encontrado']);
        }
    }
}
