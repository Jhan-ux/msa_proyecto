<?php

namespace App\Filament\Resources\Contactos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ContactosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('telefono')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('marca')
                    ->searchable(),
                TextColumn::make('asunto')
                    ->searchable()
                    ->limit(40),
                TextColumn::make('estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'nuevo'      => 'info',
                        'atendido'   => 'success',
                        'pendiente'  => 'warning',
                        default      => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                TextColumn::make('ip')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('estado')
                    ->options([
                        'nuevo'     => 'Nuevo',
                        'pendiente' => 'Pendiente',
                        'atendido'  => 'Atendido',
                    ]),
                SelectFilter::make('marca')
                    ->options([
                        'baic'           => 'BAIC',
                        'chevrolet'      => 'Chevrolet',
                        'dongfeng'       => 'Dongfeng',
                        'forland'        => 'Forland',
                        'foton'          => 'Foton',
                        'honda-autos'    => 'Honda Autos',
                        'honda-motos'    => 'Honda Motos',
                        'isuzu-camiones' => 'Isuzu Camiones',
                        'isuzu-pick-ups' => 'Isuzu Pick-Ups',
                        'omoda-jaecoo'   => 'Omoda & Jaecoo',
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
