<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
        'provider',
        'provider_user_id',
        'name',
        'email',
        'access_token',
        'refresh_token',
        'token_type',
        'scope',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            // Tokens are encrypted at rest; transparently decrypted on access.
            'access_token' => 'encrypted',
            'refresh_token' => 'encrypted',
            'expires_at' => 'datetime',
        ];
    }

    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }
}
