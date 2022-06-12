<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;

class DossiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Dossier::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossiers = Dossier::create($request->all());
        return response($dossiers, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossiers = Dossier::find($id);
        if (is_null($dossiers)) {
            return response()->json(['message' => 'Dossier not found'], 404);
        }
        return response()->json($dossiers::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dossiers = Dossier::find($id);
        if (is_null($dossiers)) {
            return response()->json(['message' => 'Dossier not found'], 404);
        }
        $dossiers->update($request->all());
        return response($dossiers, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dossiers = Dossier::find($id);
        if (is_null($dossiers)) {
            return response()->json(['message' => 'Dossier not found'], 404);
        }
        $dossiers->delete();
        return response()->json(['message' => 'Dossier deleted successfully'], 204);
    }
}
