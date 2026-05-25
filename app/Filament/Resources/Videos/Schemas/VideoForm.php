<?php

namespace App\Filament\Resources\Videos\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class VideoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')->default(fn () => auth()->id()),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('slug')->required()->maxLength(255),
                Textarea::make('description')->rows(8)->columnSpanFull(),
                TextInput::make('youtube_embed_url')->url()->required(),
                FileUpload::make('thumbnail')
                    ->disk('public')
                    ->directory('video-thumbnails')
                    ->image(),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->default('draft')
                    ->required(),
                Toggle::make('featured')->default(false),
                DateTimePicker::make('published_at'),
                TextInput::make('meta_title')->maxLength(255),
                Textarea::make('meta_description')->rows(3)->columnSpanFull(),
            ]);
    }
}
