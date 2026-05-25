<?php

namespace App\Models;

use Database\Factories\SocialPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialPost extends Model
{
    /** @use HasFactory<SocialPostFactory> */
    use HasFactory;

    protected $fillable = [
        'post_id',
        'video_id',
        'platform',
        'status',
        'caption',
        'published_url',
        'external_id',
        'scheduled_at',
        'published_at',
        'meta',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'published_at' => 'datetime',
            'meta' => 'array',
        ];
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
