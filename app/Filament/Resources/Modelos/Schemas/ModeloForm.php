<?php

namespace App\Filament\Resources\Modelos\Schemas;

use App\Models\Marca;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ModeloForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('marca_id')
                    ->label('Marca')
                    ->options(Marca::where('activo', true)->orderBy('nombre')->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('nombre')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),
                TextInput::make('slug')
                    ->default(null)
                    ->helperText('Se genera automáticamente desde el nombre'),
                Textarea::make('descripcion')
                    ->rows(3)
                    ->columnSpanFull()
                    ->default(null),
                TextInput::make('imagen')
                    ->helperText('Ruta relativa de la imagen del modelo')
                    ->default(null),
                TextInput::make('precio')
                    ->numeric()
                    ->prefix('S/')
                    ->default(null),
                Toggle::make('destacado')
                    ->default(false)
                    ->required(),
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
