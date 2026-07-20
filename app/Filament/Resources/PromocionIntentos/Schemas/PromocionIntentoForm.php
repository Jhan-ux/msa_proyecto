<?php

namespace App\Filament\Resources\PromocionIntentos\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PromocionIntentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('evento_id')
                    ->label('Evento')
                    ->relationship('evento', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('participante_id')
                    ->label('Participante')
                    ->relationship('participante', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('premio_id')
                    ->label('Premio')
                    ->relationship('premio', 'nombre')
                    ->searchable()
                    ->preload()
                    ->default(null),
                TextInput::make('puntaje_total')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Toggle::make('habilitado_ruleta')
                    ->default(false)
                    ->required(),
                TextInput::make('codigo_premio')
                    ->maxLength(40)
                    ->unique(ignoreRecord: true)
                    ->default(null),
                Select::make('estado')
                    ->options([
                        'en_proceso' => 'En proceso',
                        'finalizado' => 'Finalizado',
                        'canjeado' => 'Canjeado',
                    ])
                    ->default('finalizado')
                    ->required(),
                DateTimePicker::make('fecha_juego')
                    ->seconds(false),
            ]);
    }
}
