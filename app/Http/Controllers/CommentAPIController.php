<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
 
class CommentAPIController extends Controller
{
    public function index()
    {
        return new CommentCollection(Comment::paginate());
    }
 
    public function show(Comment $comment)
    {
        return new CommentResource($comment->load(['post']));
    }

    public function store(Request $request)
    {
        return new CommentResource(Comment::create($request->all()));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return new CommentResource($comment);
    }

    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
