<?php

namespace App\Filament\Resources\PersonalAccessTokens\Pages;

use App\Filament\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePersonalAccessToken extends CreateRecord
{
    protected static string $resource = PersonalAccessTokenResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $user = User::query()->findOrFail($data['user_id']);
        $token = $user->createToken(
            name: $data['name'],
            abilities: $data['abilities'] ?? [],
            expiresAt: $data['expires_at'] ?? null,
        );

        Notification::make()
            ->title('API token created')
            ->body("Copy this now — it will not be shown again:\n\n{$token->plainTextToken}")
            ->success()
            ->persistent()
            ->send();

        return $token->accessToken;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
