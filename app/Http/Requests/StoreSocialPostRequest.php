<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;

class StoreSocialPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'post_id' => ['nullable', 'integer', 'exists:posts,id'],
            'video_id' => ['nullable', 'integer', 'exists:videos,id'],
            'platform' => ['required', 'string', 'in:facebook,linkedin,telegram,x,instagram,tiktok,threads,youtube,website'],
            'status' => ['nullable', 'string', 'in:draft,scheduled,published,failed'],
            'caption' => ['nullable', 'string'],
            'published_url' => ['nullable', 'url', 'max:2048'],
            'external_id' => ['nullable', 'string', 'max:255'],
            'scheduled_at' => ['nullable', 'date'],
            'published_at' => ['nullable', 'date'],
            'meta' => ['nullable', 'array'],
        ];
    }

    public function after(): array
    {
        return [
            function ($validator): void {
                $postId = $this->input('post_id');
                $videoId = $this->input('video_id');

                if (! $postId && ! $videoId) {
                    $validator->errors()->add('post_id', 'Either post_id or video_id is required.');
                }

                if ($postId && $videoId) {
                    $validator->errors()->add('video_id', 'Provide either post_id or video_id, not both.');
                }
            },
        ];
    }
}
