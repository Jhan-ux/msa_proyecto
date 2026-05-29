<?php

namespace App\Filament\Resources\Modelos\Tables;

use App\Models\Marca;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('imagen')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('precio')
                    ->label('Precio S/')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('precio_dolares')
                    ->label('Precio $')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tipo')
                    ->label('Tipo')
                    ->badge()
                    ->sortable(),
                IconColumn::make('destacado')
                    ->boolean(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('orden')
                    ->numeric()
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
                SelectFilter::make('marca_id')
                    ->label('Marca')
                    ->options(Marca::orderBy('nombre')->pluck('nombre', 'id'))
                    ->searchable()
                    ->preload(),
                SelectFilter::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'Eléctrico' => 'Eléctrico',
                        'Híbrido'   => 'Híbrido',
                        'Auto'      => 'Auto',
                        'Camioneta' => 'Camioneta',
                        'Pickup'    => 'Pickup',
                        'Van'       => 'Van',
                        'Moto'      => 'Moto',
                        'Camión'   => 'Camión',
                        'Pick-Up'   => 'Pick-Up',
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
