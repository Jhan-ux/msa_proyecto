<?php

namespace App\Filament\Resources\Contactos\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
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
                    ->label('Cliente')
                    ->icon(Heroicon::OutlinedUser)
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Teléfono copiado')
                    ->icon(Heroicon::OutlinedPhone),

                TextColumn::make('categoria_vehiculo')
                    ->label('Categoría')
                    ->badge()
                    ->icon(fn (?string $state): Heroicon => match ($state) {
                        'autos'    => Heroicon::OutlinedTruck,
                        'motos'    => Heroicon::OutlinedSparkles,
                        'camiones' => Heroicon::OutlinedCube,
                        default    => Heroicon::OutlinedDocumentText,
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
                        default    => 'General',
                    }),

                TextColumn::make('marca')
                    ->label('Interés / Marca')
                    ->icon(Heroicon::OutlinedTag)
                    ->searchable()
                    ->default('—'),

                TextColumn::make('vendedor.name')
                    ->label('Asesor Asignado')
                    ->placeholder('Sin Asignar')
                    ->icon(Heroicon::OutlinedBriefcase)
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->icon(fn (?string $state): Heroicon => match ($state) {
                        'nuevo'          => Heroicon::OutlinedBellAlert,
                        'en_seguimiento' => Heroicon::OutlinedClock,
                        'cotizado'       => Heroicon::OutlinedDocumentCheck,
                        'ganado'         => Heroicon::OutlinedCheckCircle,
                        'no_interesado'  => Heroicon::OutlinedXCircle,
                        default          => Heroicon::OutlinedQuestionMarkCircle,
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'nuevo'          => 'info',
                        'en_seguimiento' => 'warning',
                        'cotizado'       => 'primary',
                        'ganado'         => 'success',
                        'no_interesado'  => 'danger',
                        default          => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'nuevo'          => 'Nuevo',
                        'en_seguimiento' => 'En Seguimiento',
                        'cotizado'       => 'Cotizado',
                        'ganado'         => 'Venta Concretada',
                        'no_interesado'  => 'No Interesado',
                        default          => ucfirst($state ?? 'Nuevo'),
                    }),

                TextColumn::make('created_at')
                    ->label('Fecha Recibida')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('categoria_vehiculo')
                    ->label('Filtrar por Categoría')
                    ->options([
                        'autos'    => 'Autos & SUVs',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones & Comerciales',
                        'general'  => 'Consulta General',
                    ]),

                SelectFilter::make('estado')
                    ->label('Filtrar por Estado')
                    ->options([
                        'nuevo'          => 'Nuevo',
                        'en_seguimiento' => 'En Seguimiento',
                        'cotizado'       => 'Cotizado',
                        'ganado'         => 'Venta Concretada',
                        'no_interesado'  => 'No Interesado',
                    ]),

                SelectFilter::make('vendedor_id')
                    ->label('Filtrar por Vendedor')
                    ->options(fn () => User::where('activo', true)->pluck('name', 'id')),
            ])
            ->recordActions([
                Action::make('whatsapp')
                    ->label('WhatsApp')
                    ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                    ->color('success')
                    ->url(function ($record) {
                        $phone = preg_replace('/\D/', '', $record->telefono ?? '');
                        if (empty($phone)) {
                            return null;
                        }
                        if (!str_starts_with($phone, '51') && strlen($phone) === 9) {
                            $phone = '51' . $phone;
                        }
                        $msg = urlencode("¡Hola {$record->nombre}! Te saludo de MSA Automotriz respecto a tu consulta sobre {$record->asunto}.");
                        return "https://wa.me/{$phone}?text={$msg}";
                    })
                    ->openUrlInNewTab(),

                EditAction::make()
                    ->label('Atender / Editar'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
