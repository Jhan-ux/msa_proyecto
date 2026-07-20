<?php

namespace App\Filament\Resources\PromocionPremios\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PromocionPremioForm
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
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('tipo_premio')
                    ->default('otro')
                    ->required(),
                TextInput::make('descripcion')
                    ->maxLength(300)
                    ->columnSpanFull(),
                TextInput::make('stock_total')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TextInput::make('stock_disponible')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TextInput::make('probabilidad_peso')
                    ->numeric()
                    ->default(1)
                    ->required(),
                TextInput::make('puntaje_minimo')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TextInput::make('puntaje_maximo')
                    ->numeric()
                    ->default(null),
                Toggle::make('activo')
                    ->default(true)
                    ->required(),
                TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}
