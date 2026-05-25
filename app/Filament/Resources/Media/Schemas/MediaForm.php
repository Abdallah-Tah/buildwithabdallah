<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')->default(fn () => auth()->id()),
                Hidden::make('disk')->default('public'),
                FileUpload::make('path')
                    ->label('File')
                    ->disk('public')
                    ->directory('uploads')
                    ->preserveFilenames()
                    ->storeFileNamesIn('original_name')
                    ->required(),
                TextInput::make('title')->maxLength(255),
                TextInput::make('alt_text')->maxLength(255),
            ]);
    }
}
