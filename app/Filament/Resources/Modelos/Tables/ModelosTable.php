<?php

namespace App\Filament\Resources\Modelos\Tables;

use App\Models\Marca;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ModelosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('marca.nombre')
                    ->label('Marca')
                    ->icon(Heroicon::OutlinedTag)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nombre')
                    ->label('Modelo')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('categoria_vehiculo')
                    ->label('Segmento')
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
                TextColumn::make('precio')
                    ->label('Precio S/')
                    ->money('PEN')
                    ->sortable(),
                TextColumn::make('precio_dolares')
                    ->label('Precio $')
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tipo')
                    ->label('Carrocería')
                    ->badge()
                    ->sortable(),
                IconColumn::make('destacado')
                    ->boolean(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('orden')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('categoria_vehiculo')
                    ->label('Segmento')
                    ->options([
                        'autos'    => 'Autos & SUVs',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones & Comerciales',
                    ]),
                SelectFilter::make('marca_id')
                    ->label('Marca')
                    ->options(Marca::orderBy('nombre')->pluck('nombre', 'id'))
                    ->searchable()
                    ->preload(),
                SelectFilter::make('tipo')
                    ->label('Carrocería')
                    ->options([
                        'Eléctrico'    => 'Eléctrico',
                        'Híbrido'      => 'Híbrido',
                        'Auto'         => 'Auto',
                        'Camioneta'    => 'Camioneta',
                        'Pickup'       => 'Pickup',
                        'Van'          => 'Van',
                        'Camión'       => 'Camión',
                        'Paseo'        => 'Paseo',
                        'Pistera'      => 'Pistera',
                        'Todo Terreno' => 'Todo Terreno',
                        'CRF'          => 'CRF',
                        'Fun Bikes'    => 'Fun Bikes',
                        'ATV'          => 'ATV',
                        '3W'           => '3W',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
