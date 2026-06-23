<?php

namespace App\Filament\Resources\Seminuevos\Pages;

use App\Filament\Resources\Seminuevos\SeminuevoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSeminuevo extends ViewRecord
{
    protected static string $resource = SeminuevoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
