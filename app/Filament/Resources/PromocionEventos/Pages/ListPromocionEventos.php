<?php

namespace App\Filament\Resources\PromocionEventos\Pages;

use App\Filament\Resources\PromocionEventos\PromocionEventoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromocionEventos extends ListRecords
{
    protected static string $resource = PromocionEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
