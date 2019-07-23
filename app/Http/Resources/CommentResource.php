<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'published' => $this->published,
            'post_id' => $this->post_id,
            'author_id' => $this->author_id,
            'reply_id' => $this->reply_id,
            'commentable' => $this->commentable,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'post' => new PostResource($this->whenLoaded('post'))
        ];
    }
}
