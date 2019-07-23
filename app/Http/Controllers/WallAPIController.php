<?php

namespace App\Http\Controllers;

use App\Models\Wall;
use App\Http\Resources\WallCollection;
use App\Http\Resources\WallResource;
 
class WallAPIController extends Controller
{
    public function index()
    {
        return new WallCollection(Wall::paginate());
    }
 
    public function show(Wall $wall)
    {
        return new WallResource($wall->load(['user', 'posts']));
    }

    public function store(Request $request)
    {
        return new WallResource(Wall::create($request->all()));
    }

    public function update(Request $request, Wall $wall)
    {
        $wall->update($request->all());

        return new WallResource($wall);
    }

    public function destroy(Request $request, Wall $wall)
    {
        $wall->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
