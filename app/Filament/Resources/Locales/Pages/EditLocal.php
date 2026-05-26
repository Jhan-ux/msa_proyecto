<?php

namespace App\Filament\Resources\Locales\Pages;

use App\Filament\Resources\Locales\LocalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLocal extends EditRecord
{
    protected static string $resource = LocalResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
