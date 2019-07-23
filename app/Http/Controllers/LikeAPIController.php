<?php

namespace App\Http\Controllers;

use App\Like;
use App\Http\Resources\LikeCollection;
use App\Http\Resources\LikeResource;
 
class LikeAPIController extends Controller
{
    public function index()
    {
        return new LikeCollection(Like::paginate());
    }
 
    public function show(Like $like)
    {
        return new LikeResource($like->load([]));
    }

    public function store(Request $request)
    {
        return new LikeResource(Like::create($request->all()));
    }

    public function update(Request $request, Like $like)
    {
        $like->update($request->all());

        return new LikeResource($like);
    }

    public function destroy(Request $request, Like $like)
    {
        $like->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
