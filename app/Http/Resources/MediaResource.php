<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
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
            'filename' => $this->filename,
            'origin_filename' => $this->origin_filename,
            'mime_type' => $this->mime_type,
            'mediable' => $this->mediable,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
