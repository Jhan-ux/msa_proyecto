<?php

namespace App\Filament\Resources\PromocionEventos;

use App\Filament\Resources\PromocionEventos\Pages\CreatePromocionEvento;
use App\Filament\Resources\PromocionEventos\Pages\EditPromocionEvento;
use App\Filament\Resources\PromocionEventos\Pages\ListPromocionEventos;
use App\Filament\Resources\PromocionEventos\Schemas\PromocionEventoForm;
use App\Filament\Resources\PromocionEventos\Tables\PromocionEventosTable;
use App\Models\PromocionEvento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromocionEventoResource extends Resource
{
    protected static ?string $model = PromocionEvento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Eventos';

    protected static ?string $modelLabel = 'Evento';

    protected static ?string $pluralModelLabel = 'Eventos';

    protected static ?int $navigationSort = 1;

    public static function getNavigationGroup(): string
    {
        return 'Promociones';
    }

    public static function form(Schema $schema): Schema
    {
        return PromocionEventoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromocionEventosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromocionEventos::route('/'),
            'create' => CreatePromocionEvento::route('/create'),
            'edit' => EditPromocionEvento::route('/{record}/edit'),
        ];
    }
}
