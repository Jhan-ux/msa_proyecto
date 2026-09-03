<?php

namespace App\Filament\Resources\Marcas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MarcasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->label('Marca')
                    ->icon(Heroicon::OutlinedTag)
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('categoria_vehiculo')
                    ->label('Categoría')
                    ->badge()
                    ->icon(fn (?string $state): Heroicon => match ($state) {
                        'autos'    => Heroicon::OutlinedTruck,
                        'motos'    => Heroicon::OutlinedSparkles,
                        'camiones' => Heroicon::OutlinedCube,
                        default    => Heroicon::OutlinedTag,
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'autos'    => 'primary',
                        'motos'    => 'warning',
                        'camiones' => 'gray',
                        default    => 'info',
                    })
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'autos'    => 'Autos',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones',
                        default    => ucfirst($state ?? 'Autos'),
                    }),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('descripcion')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('orden')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('categoria_vehiculo')
                    ->label('Categoría')
                    ->options([
                        'autos'    => 'Autos & SUVs',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones & Comerciales',
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
