<?php

namespace App\Filament\Resources\PromocionPremios\Pages;

use App\Filament\Resources\PromocionPremios\PromocionPremioResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromocionPremio extends EditRecord
{
    protected static string $resource = PromocionPremioResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
