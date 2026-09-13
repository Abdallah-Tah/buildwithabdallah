<?php

namespace App\Models;

use Database\Factories\PostCorrectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostCorrection extends Model
{
    /** @use HasFactory<PostCorrectionFactory> */
    use HasFactory;

    protected $fillable = ['reason', 'previous_content_hash', 'corrected_content_hash', 'corrected_at'];

    protected function casts(): array
    {
        return ['corrected_at' => 'datetime'];
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
