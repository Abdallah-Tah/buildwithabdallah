<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiRequestLog extends Model
{
    protected $fillable = [
        'user_id',
        'method',
        'path',
        'route_name',
        'status_code',
        'ip_address',
        'user_agent',
        'token_name',
        'abilities',
        'request_payload',
        'response_payload',
        'duration_ms',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
