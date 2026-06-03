<?php

namespace App\Filament\Resources\SocialAccounts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SocialAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('provider')
                    ->required(),
                TextInput::make('provider_user_id'),
                TextInput::make('name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('token_type'),
                TextInput::make('scope'),
                DateTimePicker::make('expires_at'),
            ]);
    }
}
