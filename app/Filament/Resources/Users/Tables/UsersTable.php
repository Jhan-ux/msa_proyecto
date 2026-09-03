<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->icon(Heroicon::OutlinedUser)
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label('Correo')
                    ->icon(Heroicon::OutlinedEnvelope)
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->label('Rol')
                    ->badge()
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'admin'    => Heroicon::OutlinedShieldCheck,
                        default    => Heroicon::OutlinedBriefcase,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'admin'    => 'danger',
                        'vendedor' => 'info',
                        default    => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin'    => 'Administrador',
                        'vendedor' => 'Vendedor',
                        default    => ucfirst($state),
                    }),

                TextColumn::make('categoria_vendedor')
                    ->label('Especialidad')
                    ->badge()
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'autos'    => Heroicon::OutlinedTruck,
                        'motos'    => Heroicon::OutlinedSparkles,
                        'camiones' => Heroicon::OutlinedCube,
                        default    => Heroicon::OutlinedGlobeAlt,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'autos'    => 'primary',
                        'motos'    => 'warning',
                        'camiones' => 'gray',
                        default    => 'success',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'autos'    => 'Autos',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones',
                        'todos'    => 'Todos',
                        default    => ucfirst($state),
                    }),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->icon(Heroicon::OutlinedPhone)
                    ->searchable()
                    ->default('—'),

                IconColumn::make('activo')
                    ->label('Activo')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Fecha Alta')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Rol')
                    ->options([
                        'admin'    => 'Administrador',
                        'vendedor' => 'Vendedor',
                    ]),

                SelectFilter::make('categoria_vendedor')
                    ->label('Especialidad')
                    ->options([
                        'autos'    => 'Autos',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones',
                        'todos'    => 'Todos',
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
