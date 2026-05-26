<?php

namespace App\Filament\Resources\ConsultaServicios\Pages;

use App\Filament\Resources\ConsultaServicios\ConsultaServicioResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConsultaServicio extends ViewRecord
{
    protected static string $resource = ConsultaServicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
