<?php

namespace App\Filament\Resources\PromocionEventos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PromocionEventoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('servicio_id')
                    ->label('Servicio relacionado')
                    ->relationship('servicio', 'nombre')
                    ->searchable()
                    ->preload()
                    ->default(null),
                TextInput::make('nombre')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Se genera automaticamente desde el nombre'),
                Select::make('estado')
                    ->options([
                        'borrador' => 'Borrador',
                        'publicado' => 'Publicado',
                        'finalizado' => 'Finalizado',
                    ])
                    ->default('publicado')
                    ->helperText('Si esta en borrador no se mostrara como promocion activa al publico.')
                    ->required(),
                DateTimePicker::make('fecha_inicio')
                    ->seconds(false),
                DateTimePicker::make('fecha_fin')
                    ->seconds(false),
                TextInput::make('max_intentos_por_participante')
                    ->numeric()
                    ->default(1)
                    ->required(),
                TextInput::make('puntaje_minimo_para_ruleta')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Toggle::make('email_opcional')
                    ->label('Email opcional')
                    ->default(true)
                    ->required(),
                Toggle::make('activo')
                    ->default(true)
                    ->required(),
                TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->required(),
                TextInput::make('descripcion_corta')
                    ->maxLength(220)
                    ->columnSpanFull(),
                Textarea::make('descripcion_larga')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
