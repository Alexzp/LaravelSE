<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Http\Resources\RatingCollection;
use App\Http\Resources\RatingResource;
 
class RatingAPIController extends Controller
{
    public function index()
    {
        return new RatingCollection(Rating::paginate());
    }
 
    public function show(Rating $rating)
    {
        return new RatingResource($rating->load([]));
    }

    public function store(Request $request)
    {
        return new RatingResource(Rating::create($request->all()));
    }

    public function update(Request $request, Rating $rating)
    {
        $rating->update($request->all());

        return new RatingResource($rating);
    }

    public function destroy(Request $request, Rating $rating)
    {
        $rating->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
