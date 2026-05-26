<?php

namespace App\Filament\Resources\ConsultaServicios\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConsultaServicioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('servicio_nombre')
                    ->label('Servicio consultado')
                    ->badge()
                    ->color('warning'),
                TextEntry::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'nuevo'       => 'danger',
                        'en_revision' => 'warning',
                        'respondido'  => 'success',
                        default       => 'gray',
                    }),
                TextEntry::make('nombre')
                    ->label('Nombre del cliente'),
                TextEntry::make('email')
                    ->label('Email')
                    ->copyable(),
                TextEntry::make('telefono')
                    ->label('Teléfono')
                    ->placeholder('No indicado'),
                TextEntry::make('vehiculo')
                    ->label('Vehículo')
                    ->placeholder('No indicado'),
                TextEntry::make('mensaje')
                    ->label('Mensaje')
                    ->placeholder('Sin mensaje')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Recibido el')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
