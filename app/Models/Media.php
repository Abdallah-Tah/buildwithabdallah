<?php

namespace App\Models;

use Database\Factories\MediaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media extends Model
{
    /** @use HasFactory<MediaFactory> */
    use HasFactory;

    protected $table = 'media';

    protected $fillable = [
        'user_id',
        'title',
        'original_name',
        'file_name',
        'disk',
        'path',
        'mime_type',
        'size',
        'alt_text',
    ];

    protected $appends = ['url'];

    protected static function booted(): void
    {
        static::saving(function (self $media): void {
            $media->disk ??= 'public';
            $media->file_name = $media->file_name ?: basename($media->path);
            $media->title = $media->title ?: Str::headline(pathinfo($media->original_name ?: $media->file_name, PATHINFO_FILENAME));
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }
}
