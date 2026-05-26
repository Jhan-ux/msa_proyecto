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
                    ->helperText('Ruta relativa, ej: img/honda/logo.png')
                    ->default(null),
                TextInput::make('imagen_hero')
                    ->helperText('Imagen del banner de la página de marca')
                    ->default(null),
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
