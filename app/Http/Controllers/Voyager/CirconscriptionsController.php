<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use App\Models\Circonscription;
use Illuminate\Http\Request;

class CirconscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Circonscription::all(), 200);
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
        $circonscription = Circonscription::create($request->all());
        return response($circonscription, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $circonscription = Circonscription::find($id);
        if (is_null($circonscription)) {
            return response()->json(['message' => 'Circonscription not found'], 404);
        }
        return response()->json($circonscription::find($id), 200);
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
        $circonscription = Circonscription::find($id);
        if (is_null($circonscription)) {
            return response()->json(['message' => 'Circonscription not found'], 404);
        }
        $circonscription->update($request->all());
        return response($circonscription, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $circonscription = Circonscription::find($id);
        if (is_null($circonscription)) {
            return response()->json(['message' => 'Circonscription not found'], 404);
        }
        $circonscription->delete();
        return response()->json(['message' => 'Circonscription deleted successfully'], 204);
    }
}
