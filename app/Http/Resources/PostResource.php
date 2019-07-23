<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'slug' => $this->slug,
            'published' => $this->published,
            'author_id' => $this->author_id,
            'thumbnail_id' => $this->thumbnail_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'comments' => new CommentCollection($this->whenLoaded('comments')),
            'walls' => new WallCollection($this->whenLoaded('walls')),
            'categories' => new CategoryCollection($this->whenLoaded('categories')),
            'tags' => new TagCollection($this->whenLoaded('tags'))
        ];
    }
}
