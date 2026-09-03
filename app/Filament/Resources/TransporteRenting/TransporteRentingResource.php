<?php

namespace App\Filament\Resources\TransporteRenting;

use App\Filament\Resources\TransporteRenting\Pages\CreateTransporteRenting;
use App\Filament\Resources\TransporteRenting\Pages\EditTransporteRenting;
use App\Filament\Resources\TransporteRenting\Pages\ListTransporteRenting;
use App\Filament\Resources\TransporteRenting\Schemas\TransporteRentingForm;
use App\Filament\Resources\TransporteRenting\Tables\TransporteRentingTable;
use App\Models\TransporteRenting as TransporteRentingModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TransporteRentingResource extends Resource
{
    protected static ?string $model = TransporteRentingModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Transporte y Renting';

    protected static ?string $modelLabel = 'Servicio';

    protected static ?string $pluralModelLabel = 'Transporte y Renting';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): string
    {
        return 'Catálogo';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return TransporteRentingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransporteRentingTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTransporteRenting::route('/'),
            'create' => CreateTransporteRenting::route('/create'),
            'edit'   => EditTransporteRenting::route('/{record}/edit'),
        ];
    }
}
