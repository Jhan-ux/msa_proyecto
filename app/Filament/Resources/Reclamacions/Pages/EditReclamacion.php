<?php

namespace App\Filament\Resources\Reclamacions\Pages;

use App\Filament\Resources\Reclamacions\ReclamacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReclamacion extends EditRecord
{
    protected static string $resource = ReclamacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
