<?php

namespace App\Filament\Resources\PersonalAccessTokens\Schemas;

use App\Models\User;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PersonalAccessTokenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->options(User::query()->orderBy('name')->pluck('email', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                CheckboxList::make('abilities')
                    ->options([
                        'posts:create' => 'posts:create',
                        'posts:update' => 'posts:update',
                        'posts:delete' => 'posts:delete',
                        'posts:publish' => 'posts:publish',
                        'videos:create' => 'videos:create',
                        'videos:update' => 'videos:update',
                        'videos:delete' => 'videos:delete',
                        'videos:publish' => 'videos:publish',
                        'media:upload' => 'media:upload',
                        'admin:read' => 'admin:read',
                    ])
                    ->columns(2)
                    ->required(),
                DateTimePicker::make('expires_at'),
            ]);
    }
}
