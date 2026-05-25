<?php

namespace App\Filament\Resources\PersonalAccessTokens;

use App\Filament\Resources\PersonalAccessTokens\Pages\CreatePersonalAccessToken;
use App\Filament\Resources\PersonalAccessTokens\Pages\ListPersonalAccessTokens;
use App\Filament\Resources\PersonalAccessTokens\Pages\ViewPersonalAccessToken;
use App\Filament\Resources\PersonalAccessTokens\Schemas\PersonalAccessTokenForm;
use App\Filament\Resources\PersonalAccessTokens\Schemas\PersonalAccessTokenInfolist;
use App\Filament\Resources\PersonalAccessTokens\Tables\PersonalAccessTokensTable;
use App\Models\PersonalAccessToken;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PersonalAccessTokenResource extends Resource
{
    protected static ?string $model = PersonalAccessToken::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedKey;

    protected static string|\UnitEnum|null $navigationGroup = 'Access';

    public static function form(Schema $schema): Schema
    {
        return PersonalAccessTokenForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PersonalAccessTokenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PersonalAccessTokensTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPersonalAccessTokens::route('/'),
            'create' => CreatePersonalAccessToken::route('/create'),
            'view' => ViewPersonalAccessToken::route('/{record}'),
        ];
    }
}
