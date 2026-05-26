<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'post_id' => ['sometimes', 'nullable', 'integer', 'exists:posts,id'],
            'video_id' => ['sometimes', 'nullable', 'integer', 'exists:videos,id'],
            'platform' => ['sometimes', 'required', 'string', 'in:facebook,linkedin,telegram,x,instagram,tiktok,threads,youtube,website'],
            'status' => ['sometimes', 'nullable', 'string', 'in:draft,scheduled,published,failed'],
            'caption' => ['sometimes', 'nullable', 'string'],
            'published_url' => ['sometimes', 'nullable', 'url', 'max:2048'],
            'external_id' => ['sometimes', 'nullable', 'string', 'max:255'],
            'scheduled_at' => ['sometimes', 'nullable', 'date'],
            'published_at' => ['sometimes', 'nullable', 'date'],
            'meta' => ['sometimes', 'nullable', 'array'],
        ];
    }

    public function after(): array
    {
        return [
            function ($validator): void {
                $postId = array_key_exists('post_id', $this->all()) ? $this->input('post_id') : $this->route('socialPost')?->post_id;
                $videoId = array_key_exists('video_id', $this->all()) ? $this->input('video_id') : $this->route('socialPost')?->video_id;

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
