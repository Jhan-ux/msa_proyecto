<?php

namespace App\Filament\Resources\TransporteRenting\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TransporteRentingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Se genera automáticamente desde el nombre'),
                Textarea::make('descripcion')
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('imagen')
                    ->label('Imagen (URL o ruta)')
                    ->helperText('URL completa (https://...) o ruta relativa desde public/ (ej: img/transporte/renta.jpg)')
                    ->placeholder('https://example.com/foto.jpg  ó  img/transporte/foto.jpg')
                    ->columnSpanFull(),
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
