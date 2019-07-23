<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
 
class PostAPIController extends Controller
{
    public function index()
    {
        return new PostCollection(Post::paginate());
    }
 
    public function show(Post $post)
    {
        return new PostResource($post->load(['comments', 'walls', 'categories', 'tags']));
    }

    public function store(Request $request)
    {
        return new PostResource(Post::create($request->all()));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return new PostResource($post);
    }

    public function destroy(Request $request, Post $post)
    {
        $post->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
