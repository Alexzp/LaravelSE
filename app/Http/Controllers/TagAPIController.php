<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagResource;
 
class TagAPIController extends Controller
{
    public function index()
    {
        return new TagCollection(Tag::paginate());
    }
 
    public function show(Tag $tag)
    {
        return new TagResource($tag->load(['posts']));
    }

    public function store(Request $request)
    {
        return new TagResource(Tag::create($request->all()));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return new TagResource($tag);
    }

    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
