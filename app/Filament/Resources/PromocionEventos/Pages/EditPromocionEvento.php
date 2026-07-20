<?php

namespace App\Filament\Resources\PromocionEventos\Pages;

use App\Filament\Resources\PromocionEventos\PromocionEventoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromocionEvento extends EditRecord
{
    protected static string $resource = PromocionEventoResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
