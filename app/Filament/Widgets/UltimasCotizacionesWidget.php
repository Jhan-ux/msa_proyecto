<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Contactos\ContactoResource;
use App\Models\Contacto;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class UltimasCotizacionesWidget extends BaseWidget
{
    protected static ?int $sort = -1;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Últimas Cotizaciones & Leads Recibidos';

    public function table(Table $table): Table
    {
        return $table
            ->query(function () {
                $user = auth()->user();
                $query = Contacto::query()->latest('created_at')->limit(8);

                if ($user && $user->isVendedor()) {
                    $cat = $user->categoria_vendedor ?? 'todos';
                    if ($cat !== 'todos') {
                        $query->where(function (Builder $q) use ($cat, $user) {
                            $q->where('categoria_vehiculo', $cat)
                              ->orWhere('vendedor_id', $user->id);
                        });
                    }
                }

                return $query;
            })
            ->columns([
                TextColumn::make('nombre')
                    ->label('Cliente')
                    ->icon(Heroicon::OutlinedUser)
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->icon(Heroicon::OutlinedPhone)
                    ->copyable(),

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
                    ->label('Interés')
                    ->default('—'),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'nuevo'          => 'danger',
                        'en_seguimiento' => 'warning',
                        'cotizado'       => 'info',
                        'ganado'         => 'success',
                        default          => 'gray',
                    })
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'nuevo'          => 'Nuevo',
                        'en_seguimiento' => 'En Seguimiento',
                        'cotizado'       => 'Cotizado',
                        'ganado'         => 'Venta Concretada',
                        default          => ucfirst($state ?? 'Nuevo'),
                    }),

                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m H:i')
                    ->sortable(),
            ])
            ->recordActions([
                Action::make('whatsapp')
                    ->label('WhatsApp')
                    ->icon(Heroicon::OutlinedChatBubbleLeftRight)
                    ->color('success')
                    ->url(function (Contacto $record) {
                        $phone = preg_replace('/\D/', '', $record->telefono ?? '');
                        if (empty($phone)) return null;
                        if (!str_starts_with($phone, '51') && strlen($phone) === 9) {
                            $phone = '51' . $phone;
                        }
                        $msg = urlencode("¡Hola {$record->nombre}! Te saludo de MSA Automotriz respecto a tu consulta sobre {$record->asunto}.");
                        return "https://wa.me/{$phone}?text={$msg}";
                    })
                    ->openUrlInNewTab(),

                Action::make('ver')
                    ->label('Atender')
                    ->icon(Heroicon::OutlinedPencilSquare)
                    ->color('primary')
                    ->url(fn (Contacto $record): string => ContactoResource::getUrl('edit', ['record' => $record])),
            ])
            ->paginated(false);
    }
}
