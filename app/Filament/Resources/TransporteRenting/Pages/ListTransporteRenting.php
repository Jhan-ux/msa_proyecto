<?php

namespace App\Filament\Resources\TransporteRenting\Pages;

use App\Filament\Resources\TransporteRenting\TransporteRentingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransporteRenting extends ListRecords
{
    protected static string $resource = TransporteRentingResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
