<?php

namespace App\Filament\Resources\PromocionPreguntas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromocionPreguntasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('evento.nombre')
                    ->label('Evento')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pregunta')
                    ->limit(90)
                    ->searchable(),
                TextColumn::make('tipo')
                    ->badge(),
                TextColumn::make('puntaje')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('orden')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('activa')
                    ->boolean(),
            ])
            ->defaultSort('orden')
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
