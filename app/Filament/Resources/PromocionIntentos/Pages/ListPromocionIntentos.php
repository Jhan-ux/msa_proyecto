<?php

namespace App\Filament\Resources\PromocionIntentos\Pages;

use App\Filament\Resources\PromocionIntentos\PromocionIntentoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromocionIntentos extends ListRecords
{
    protected static string $resource = PromocionIntentoResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
