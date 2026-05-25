<?php

namespace App\Filament\Resources\PersonalAccessTokens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PersonalAccessTokensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tokenable.email')->label('User')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('abilities')->badge()->separator(','),
                TextColumn::make('last_used_at')->since()->placeholder('Never'),
                TextColumn::make('expires_at')->dateTime()->placeholder('No expiry'),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
