<?php

namespace App\Http\Controllers\voyager;

use App\Http\Controllers\Controller;

use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        return response()->json(Album::all(), 200);
    }
}
