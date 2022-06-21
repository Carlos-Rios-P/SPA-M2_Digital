<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign = Campaign::all();

        return response()->json($campaign, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, CampaignRequest $request)
    {
        $campaign = Campaign::create([
            'group_id'      => $id,
            'nome_campanha' => $request->nome_campanha
        ]);

        return response()->json($campaign, 200);
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

            $campaign = Campaign::findOrFail($id);

            return response()->json($campaign, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Id da campanha não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignRequest $request, $id)
    {
        try {

            $campaign = Campaign::findOrFail($id);
            $campaign->update($request->all());

            return response()->json($campaign, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Id da campanha não encontrado'], 404);
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

            $campaign = Campaign::findOrFail($id);
            $campaign->delete($id);

            return response()->json(['sucess' => 'Campanha excluída com sucesso'], 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => 'Id da campanha não encontrado'], 404);
        }
    }
}
