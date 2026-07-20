<?php

namespace App\Filament\Resources\PromocionEventos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PromocionEventosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('estado')
                    ->badge(),
                TextColumn::make('max_intentos_por_participante')
                    ->label('Intentos max')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('puntaje_minimo_para_ruleta')
                    ->label('Puntaje min ruleta')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('email_opcional')
                    ->boolean(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('orden')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fecha_inicio')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('fecha_fin')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
