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
                    ->helperText('URL completa (https://...) o ruta relativa desde public/ (ej: img/chevrolet/tracker.jpg)')
                    ->placeholder('https://example.com/foto.jpg  ó  img/chevrolet/tracker.jpg')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('precio')
                    ->numeric()
                    ->prefix('S/')
                    ->label('Precio (Soles)')
                    ->default(null),
                TextInput::make('precio_dolares')
                    ->numeric()
                    ->prefix('$')
                    ->label('Precio (Dólares)')
                    ->default(null),
                Select::make('tipo')
                    ->label('Tipo / Categoría')
                    ->options([
                        'Vehículos' => [
                            'Eléctrico'   => 'Eléctrico',
                            'Híbrido'     => 'Híbrido',
                            'Auto'        => 'Auto',
                            'Camioneta'   => 'Camioneta',
                            'Pickup'      => 'Pickup',
                            'Van'         => 'Van',
                            'Camión'      => 'Camión',
                            'SUV'         => 'SUV',
                        ],
                        'Motos' => [
                            'Paseo'           => 'Paseo',
                            'Pistera'         => 'Pistera',
                            'Todo Terreno'    => 'Todo Terreno',
                            'CRF'             => 'CRF',
                            'Fun Bikes'       => 'Fun Bikes',
                            'ATV'             => 'ATV',
                            '3W'              => '3W',
                        ],
                        'Camiones' => [
                            'SERIE-N' => 'SERIE-N',
                            'SERIE-F' => 'SERIE-F',
                        ],

                    ])
                    ->searchable()
                    ->default(null),
                Toggle::make('destacado')
                    ->label('Destacado en la Home')
                    ->helperText('Los modelos destacados aparecen en la sección "Modelos Destacados" de la página principal')
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
