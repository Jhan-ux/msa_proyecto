<?php

namespace App\Filament\Resources\Contactos;

use App\Filament\Resources\Contactos\Pages\CreateContacto;
use App\Filament\Resources\Contactos\Pages\EditContacto;
use App\Filament\Resources\Contactos\Pages\ListContactos;
use App\Filament\Resources\Contactos\Schemas\ContactoForm;
use App\Filament\Resources\Contactos\Tables\ContactosTable;
use App\Models\Contacto;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ContactoResource extends Resource
{
    protected static ?string $model = Contacto::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Cotizaciones & Leads';

    protected static ?string $modelLabel = 'Cotización';

    protected static ?string $pluralModelLabel = 'Cotizaciones & Leads';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): string
    {
        return 'Ventas & Clientes';
    }

    /**
     * Filtrar cotizaciones automáticamente según el rol y especialidad del vendedor
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

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
    }

    public static function form(Schema $schema): Schema
    {
        return ContactoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListContactos::route('/'),
            'create' => CreateContacto::route('/create'),
            'edit'   => EditContacto::route('/{record}/edit'),
        ];
    }
}
