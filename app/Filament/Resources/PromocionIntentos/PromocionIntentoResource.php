<?php

namespace App\Filament\Resources\PromocionIntentos;

use App\Filament\Resources\PromocionIntentos\Pages\CreatePromocionIntento;
use App\Filament\Resources\PromocionIntentos\Pages\EditPromocionIntento;
use App\Filament\Resources\PromocionIntentos\Pages\ListPromocionIntentos;
use App\Filament\Resources\PromocionIntentos\Schemas\PromocionIntentoForm;
use App\Filament\Resources\PromocionIntentos\Tables\PromocionIntentosTable;
use App\Models\PromocionIntento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromocionIntentoResource extends Resource
{
    protected static ?string $model = PromocionIntento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'codigo_premio';

    protected static ?string $navigationLabel = 'Intentos';

    protected static ?string $modelLabel = 'Intento';

    protected static ?string $pluralModelLabel = 'Intentos';

    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): string
    {
        return 'Promociones';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return PromocionIntentoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromocionIntentosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromocionIntentos::route('/'),
            'create' => CreatePromocionIntento::route('/create'),
            'edit' => EditPromocionIntento::route('/{record}/edit'),
        ];
    }
}
