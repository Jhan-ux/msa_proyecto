<?php

namespace App\Filament\Resources\Locales\Pages;

use App\Filament\Resources\Locales\LocalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLocales extends ListRecords
{
    protected static string $resource = LocalResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
