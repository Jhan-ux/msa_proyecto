<?php

namespace App\Filament\Resources\PromocionIntentos\Pages;

use App\Filament\Resources\PromocionIntentos\PromocionIntentoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromocionIntento extends EditRecord
{
    protected static string $resource = PromocionIntentoResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
