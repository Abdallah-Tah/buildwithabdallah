<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'cover_image' => $this->cover_image,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'status' => $this->status,
            'featured' => $this->featured,
            'published_at' => $this->published_at,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'content_hash' => $this->content_hash,
            'reading_time_minutes' => $this->reading_time_minutes,
            'editorial_approved_hash' => $this->editorial_approved_hash,
            'editorial_approved_at' => $this->editorial_approved_at,
            'editorial_approval_record_hash' => $this->editorial_approval_record_hash,
            'corrections' => $this->whenLoaded('corrections'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
