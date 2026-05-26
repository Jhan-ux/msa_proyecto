<?php

namespace App\Filament\Resources\ConsultaServicios\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ConsultaServicioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('servicio_id')
                    ->label('Servicio')
                    ->relationship('servicio', 'nombre')
                    ->default(null),
                Select::make('estado')
                    ->label('Estado')
                    ->options(['nuevo' => 'Nuevo', 'en_revision' => 'En revisión', 'respondido' => 'Respondido'])
                    ->default('nuevo')
                    ->required(),
                TextInput::make('servicio_nombre')
                    ->label('Nombre del servicio')
                    ->required(),
                TextInput::make('nombre')
                    ->label('Nombre del cliente')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                TextInput::make('telefono')
                    ->label('Teléfono')
                    ->tel()
                    ->default(null),
                TextInput::make('vehiculo')
                    ->label('Vehículo')
                    ->default(null),
                Textarea::make('mensaje')
                    ->label('Mensaje')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
