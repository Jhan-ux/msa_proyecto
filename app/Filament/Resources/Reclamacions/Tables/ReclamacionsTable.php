<?php

namespace App\Filament\Resources\Reclamacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReclamacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nro_reclamo')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('nombre')
                    ->searchable()
                    ->formatStateUsing(fn ($record) => $record->nombre.' '.$record->ap_paterno),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('telefono')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tipo_bien')
                    ->badge(),
                TextColumn::make('tienda')
                    ->searchable(),
                TextColumn::make('monto')
                    ->money('PEN')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente'  => 'warning',
                        'resuelto'   => 'success',
                        'en_proceso' => 'info',
                        default      => 'gray',
                    }),
                TextColumn::make('tipo_persona')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('departamento')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('descripcion')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('estado')
                    ->options([
                        'pendiente'  => 'Pendiente',
                        'en_proceso' => 'En Proceso',
                        'resuelto'   => 'Resuelto',
                    ]),
                SelectFilter::make('tienda')
                    ->options([
                        'Cajamarca'       => 'Cajamarca',
                        'Lima'            => 'Lima',
                        'Piura'           => 'Piura',
                        'Baños del Inca'  => 'Baños del Inca',
                    ]),
            ])
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
