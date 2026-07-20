<?php

namespace App\Filament\Resources\PromocionPreguntas\Pages;

use App\Filament\Resources\PromocionPreguntas\PromocionPreguntaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromocionPreguntas extends ListRecords
{
    protected static string $resource = PromocionPreguntaResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
