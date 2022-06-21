<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Group::all();

        return response()->json($group, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $group = Group::create($request->all());

        return response()->json($group, 200);
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
            $group =  Group::findOrFail($id);

            return response()->json($group, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do grupo não encontrado.']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        try {

            $group =  Group::findOrFail($id);
            $group->update($request->all());

            return response()->json($group, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do grupo não encontrado.']);
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

            $group = Group::findOrFail($id);
            $group->delete($id);

            return response()->json(['sucess' => 'Grupo deletado com sucesso!']);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'ID do grupo não encontrado.']);
        }
    }
}
