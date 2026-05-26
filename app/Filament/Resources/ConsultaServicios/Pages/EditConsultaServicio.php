<?php

namespace App\Filament\Resources\ConsultaServicios\Pages;

use App\Filament\Resources\ConsultaServicios\ConsultaServicioResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConsultaServicio extends EditRecord
{
    protected static string $resource = ConsultaServicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
