<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use App\Models\Commite;
use Illuminate\Http\Request;

class CommitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Commite::all(), 200);
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
        $commites = Commite::create($request->all());
        return response($commites, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commites = Commite::find($id);
        if (is_null($commites)) {
            return response()->json(['message' => 'Commite not found'], 404);
        }
        return response()->json($commites::find($id), 200);
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
        $commites = Commite::find($id);
        if (is_null($commites)) {
            return response()->json(['message' => 'Commite not found'], 404);
        }
        $commites->update($request->all());
        return response($commites, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commites = Commite::find($id);
        if (is_null($commites)) {
            return response()->json(['message' => 'Commite not found'], 404);
        }
        $commites->delete();
        return response()->json(['message' => 'commites deleted successfully'], 204);
    }
}
