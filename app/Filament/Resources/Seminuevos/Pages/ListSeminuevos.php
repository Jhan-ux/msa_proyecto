<?php

namespace App\Filament\Resources\Seminuevos\Pages;

use App\Filament\Resources\Seminuevos\SeminuevoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSeminuevos extends ListRecords
{
    protected static string $resource = SeminuevoResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
