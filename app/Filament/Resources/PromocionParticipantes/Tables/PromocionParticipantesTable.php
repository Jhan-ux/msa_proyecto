<?php

namespace App\Filament\Resources\PromocionParticipantes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromocionParticipantesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('evento.nombre')
                    ->label('Evento')
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('apellidos')
                    ->searchable(),
                TextColumn::make('telefono')
                    ->label('Telefono')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('acepta_terminos')
                    ->boolean(),
                TextColumn::make('created_at')
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
