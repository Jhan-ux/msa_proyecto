<?php

namespace App\Filament\Resources\PromocionParticipantes\Pages;

use App\Filament\Resources\PromocionParticipantes\PromocionParticipanteResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromocionParticipante extends EditRecord
{
    protected static string $resource = PromocionParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
