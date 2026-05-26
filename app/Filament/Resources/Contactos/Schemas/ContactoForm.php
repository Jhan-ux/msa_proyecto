<?php

namespace App\Filament\Resources\Contactos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('telefono')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('marca')
                    ->default(null),
                TextInput::make('asunto')
                    ->required(),
                Textarea::make('mensaje')
                    ->required()
                    ->columnSpanFull(),
                Select::make('estado')
                    ->options(['nuevo' => 'Nuevo', 'leido' => 'Leido', 'respondido' => 'Respondido'])
                    ->default('nuevo')
                    ->required(),
                TextInput::make('ip')
                    ->default(null),
            ]);
    }
}
