<?php

namespace App\Filament\Resources\Servicios\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServicioForm
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
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('icono')
                    ->helperText('Nombre del icono (ej: wrench-screwdriver, cog-6-tooth)')
                    ->placeholder('wrench-screwdriver'),
                TextInput::make('imagen')
                    ->helperText('Puedes usar URL completa (https://...), ruta en public (img/servicios/foto.jpg) o ruta en storage (servicios/foto.jpg)')
                    ->placeholder('https://example.com/img.jpg  ó  img/servicios/foto.jpg  ó  servicios/foto.jpg')
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
