<?php

namespace App\Filament\Resources\PersonalAccessTokens\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PersonalAccessTokenInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('tokenable.email')->label('User'),
                TextEntry::make('name'),
                TextEntry::make('abilities')->badge()->separator(','),
                TextEntry::make('last_used_at')->dateTime()->placeholder('-'),
                TextEntry::make('expires_at')->dateTime()->placeholder('-'),
                TextEntry::make('created_at')->dateTime()->placeholder('-'),
            ]);
    }
}
