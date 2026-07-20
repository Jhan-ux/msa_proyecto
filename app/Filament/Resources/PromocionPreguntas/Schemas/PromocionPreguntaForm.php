<?php

namespace App\Filament\Resources\PromocionPreguntas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PromocionPreguntaForm
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
                Select::make('tipo')
                    ->options([
                        'single' => 'Respuesta unica',
                        'multiple' => 'Multiple',
                        'true_false' => 'Verdadero/Falso',
                    ])
                    ->default('single')
                    ->required(),
                TextInput::make('puntaje')
                    ->numeric()
                    ->default(1)
                    ->required(),
                TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Toggle::make('activa')
                    ->default(true)
                    ->required(),
                Textarea::make('pregunta')
                    ->rows(3)
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
