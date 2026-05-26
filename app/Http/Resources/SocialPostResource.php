<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialPostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'platform' => $this->platform,
            'status' => $this->status,
            'caption' => $this->caption,
            'published_url' => $this->published_url,
            'external_id' => $this->external_id,
            'scheduled_at' => $this->scheduled_at,
            'published_at' => $this->published_at,
            'meta' => $this->meta,
            'post_id' => $this->post_id,
            'video_id' => $this->video_id,
            'post' => new PostResource($this->whenLoaded('post')),
            'video' => new VideoResource($this->whenLoaded('video')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
