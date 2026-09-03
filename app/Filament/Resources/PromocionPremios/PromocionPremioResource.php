<?php

namespace App\Filament\Resources\PromocionPremios;

use App\Filament\Resources\PromocionPremios\Pages\CreatePromocionPremio;
use App\Filament\Resources\PromocionPremios\Pages\EditPromocionPremio;
use App\Filament\Resources\PromocionPremios\Pages\ListPromocionPremios;
use App\Filament\Resources\PromocionPremios\Schemas\PromocionPremioForm;
use App\Filament\Resources\PromocionPremios\Tables\PromocionPremiosTable;
use App\Models\PromocionPremio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromocionPremioResource extends Resource
{
    protected static ?string $model = PromocionPremio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Premios';

    protected static ?string $modelLabel = 'Premio';

    protected static ?string $pluralModelLabel = 'Premios';

    protected static ?int $navigationSort = 3;

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
        return PromocionPremioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromocionPremiosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromocionPremios::route('/'),
            'create' => CreatePromocionPremio::route('/create'),
            'edit' => EditPromocionPremio::route('/{record}/edit'),
        ];
    }
}
