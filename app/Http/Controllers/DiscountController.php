<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = Discount::all();

        return response()->json($discount, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, DiscountRequest $request)
    {
        $discount = Discount::create([
            'product_id'        => $id,
            'valor_desconto'    => $request->valor_desconto
        ]);

        return response()->json($discount, 200);
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

            $discount = Discount::findOrFail($id);

            return response()->json($discount, 200);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do desconto não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {
        try {

            $discount = Discount::findOrFail($id);
            $discount->update($request->all());

            return response()->json($discount, 200);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do desconto não encontrado'], 404);
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

            $discount = Discount::findOrFail($id);
            $discount->delete($id);

            return response()->json(['sucess' => 'Desconto excluído com sucesso'], 200);
        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do desconto não encontrado'], 404);
        }
    }
}
