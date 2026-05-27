<?php

namespace App\Filament\Resources\Marcas\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MarcaForm
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
                    ->columnSpanFull()
                    ->default(null),
                TextInput::make('imagen')
                    ->label('Logo de la Marca')
                    ->helperText('URL completa (https://...) o ruta relativa desde public/ (ej: img/honda/logo.png)')
                    ->placeholder('https://example.com/logo.png  ó  img/honda/logo.png')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('imagen_hero')
                    ->label('Imagen Hero (banner de la página de marca)')
                    ->helperText('URL completa (https://...) o ruta relativa — aparece como fondo del encabezado')
                    ->placeholder('https://example.com/banner.jpg  ó  img/honda/hero.jpg')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('activo')
                    ->default(true)
                    ->required(),
                TextInput::make('orden')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
