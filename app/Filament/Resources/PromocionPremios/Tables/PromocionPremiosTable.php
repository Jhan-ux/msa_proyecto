<?php

namespace App\Filament\Resources\PromocionPremios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromocionPremiosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('evento.nombre')
                    ->label('Evento')
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tipo_premio')
                    ->badge(),
                TextColumn::make('stock_total'),
                TextColumn::make('stock_disponible')
                    ->sortable(),
                TextColumn::make('probabilidad_peso'),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('orden')
                    ->sortable(),
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
