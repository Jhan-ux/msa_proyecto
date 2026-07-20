<?php

namespace App\Filament\Resources\PromocionParticipantes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PromocionParticipanteForm
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
                TextInput::make('apellidos')
                    ->required(),
                TextInput::make('telefono')
                    ->label('Telefono')
                    ->required()
                    ->maxLength(20),
                TextInput::make('email')
                    ->email()
                    ->default(null),
                Toggle::make('acepta_terminos')
                    ->default(false)
                    ->required(),
                TextInput::make('ip')
                    ->default(null),
                TextInput::make('user_agent')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
