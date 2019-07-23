<?php

namespace App\Http\Controllers;

use App\Media;
use App\Http\Resources\MediaCollection;
use App\Http\Resources\MediaResource;
 
class MediaAPIController extends Controller
{
    public function index()
    {
        return new MediaCollection(Media::paginate());
    }
 
    public function show(Media $media)
    {
        return new MediaResource($media->load([]));
    }

    public function store(Request $request)
    {
        return new MediaResource(Media::create($request->all()));
    }

    public function update(Request $request, Media $media)
    {
        $media->update($request->all());

        return new MediaResource($media);
    }

    public function destroy(Request $request, Media $media)
    {
        $media->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
