<?php

namespace App\Filament\Resources\PromocionIntentos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromocionIntentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('evento.nombre')
                    ->label('Evento')
                    ->searchable(),
                TextColumn::make('participante.nombre')
                    ->label('Participante')
                    ->searchable(),
                TextColumn::make('puntaje_total')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('habilitado_ruleta')
                    ->boolean(),
                TextColumn::make('premio.nombre')
                    ->label('Premio')
                    ->toggleable(),
                TextColumn::make('codigo_premio')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('estado')
                    ->badge(),
                TextColumn::make('fecha_juego')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
