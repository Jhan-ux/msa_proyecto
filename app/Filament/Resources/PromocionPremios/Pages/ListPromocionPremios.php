<?php

namespace App\Filament\Resources\PromocionPremios\Pages;

use App\Filament\Resources\PromocionPremios\PromocionPremioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromocionPremios extends ListRecords
{
    protected static string $resource = PromocionPremioResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
