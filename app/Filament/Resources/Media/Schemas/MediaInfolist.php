<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MediaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('User')
                    ->placeholder('-'),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('original_name'),
                TextEntry::make('file_name'),
                TextEntry::make('disk'),
                TextEntry::make('path'),
                TextEntry::make('mime_type')
                    ->placeholder('-'),
                TextEntry::make('size')
                    ->numeric(),
                TextEntry::make('alt_text')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
