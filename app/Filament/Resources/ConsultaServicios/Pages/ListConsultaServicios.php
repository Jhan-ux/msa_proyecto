<?php

namespace App\Filament\Resources\ConsultaServicios\Pages;

use App\Filament\Resources\ConsultaServicios\ConsultaServicioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConsultaServicios extends ListRecords
{
    protected static string $resource = ConsultaServicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
