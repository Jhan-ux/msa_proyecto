<?php

namespace App\Filament\Resources\PromocionPreguntas\Pages;

use App\Filament\Resources\PromocionPreguntas\PromocionPreguntaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromocionPregunta extends EditRecord
{
    protected static string $resource = PromocionPreguntaResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
