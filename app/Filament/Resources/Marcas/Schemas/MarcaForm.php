<?php

namespace App\Filament\Resources\Marcas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class MarcaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->prefixIcon(Heroicon::OutlinedTag)
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),
                Select::make('categoria_vehiculo')
                    ->label('Categoría de Marca')
                    ->prefixIcon(Heroicon::OutlinedTruck)
                    ->options([
                        'autos'    => 'Autos & SUVs',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones & Pesados',
                    ])
                    ->default('autos')
                    ->required()
                    ->helperText('Permite derivar cotizaciones a los vendedores correspondientes.'),
                TextInput::make('slug')
                    ->prefixIcon(Heroicon::OutlinedLink)
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Se genera automáticamente desde el nombre'),
                Textarea::make('descripcion')
                    ->rows(3)
                    ->columnSpanFull()
                    ->default(null),
                TextInput::make('imagen')
                    ->label('Logo de la Marca')
                    ->prefixIcon(Heroicon::OutlinedPhoto)
                    ->helperText('URL completa (https://...) o ruta relativa desde public/ (ej: img/honda/logo.png)')
                    ->placeholder('https://example.com/logo.png  ó  img/honda/logo.png')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('imagen_hero')
                    ->label('Imagen Hero (banner de la página de marca)')
                    ->prefixIcon(Heroicon::OutlinedPhoto)
                    ->helperText('URL completa (https://...) o ruta relativa — aparece como fondo del encabezado')
                    ->placeholder('https://example.com/banner.jpg  ó  img/honda/hero.jpg')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('activo')
                    ->default(true)
                    ->required(),
                TextInput::make('orden')
                    ->prefixIcon(Heroicon::OutlinedNumberedList)
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
