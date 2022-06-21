<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::all();

        return response()->json($city, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, CityRequest $request)
    {
        $city = City::create([
            'nome_cidade'   => $request->nome_cidade,
            'group_id'      => $id
        ]);

        return response()->json($city, 200);
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

            $city = City::findOrFail($id);

            return response()->json($city, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID da cidade não encotrado.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        try {

            $city = City::findOrFail($id);
            $city->update($request->all());

            return response()->json($city, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID da cidade não encotrado.'], 404);
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

            $city = City::findOrFail($id);
            $city->delete($id);

            return response()->json(['sucess' => 'Cidade deletada com sucesso']);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID da cidade não encotrado.'], 404);
        }
    }
}
