<?php

namespace App\Filament\Resources\PersonalAccessTokens\Pages;

use App\Filament\Resources\PersonalAccessTokens\PersonalAccessTokenResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonalAccessToken extends ViewRecord
{
    protected static string $resource = PersonalAccessTokenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
