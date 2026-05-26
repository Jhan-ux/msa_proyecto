<?php

namespace App\Filament\Resources\Reclamacions\Pages;

use App\Filament\Resources\Reclamacions\ReclamacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReclamacions extends ListRecords
{
    protected static string $resource = ReclamacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
