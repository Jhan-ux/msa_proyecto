<?php

namespace App\Filament\Resources\Seminuevos;

use App\Filament\Resources\Seminuevos\Pages\CreateSeminuevo;
use App\Filament\Resources\Seminuevos\Pages\EditSeminuevo;
use App\Filament\Resources\Seminuevos\Pages\ListSeminuevos;
use App\Filament\Resources\Seminuevos\Schemas\SeminuevoForm;
use App\Filament\Resources\Seminuevos\Tables\SeminuevoTable;
use App\Models\Seminuevo as SeminuevoModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SeminuevoResource extends Resource
{
    protected static ?string $model = SeminuevoModel::class;

    protected static ?string $slug = 'seminuevos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTruck;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Seminuevos';

    protected static ?string $modelLabel = 'Seminuevo';

    protected static ?string $pluralModelLabel = 'Seminuevos';

    protected static ?int $navigationSort = 5;

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
        return SeminuevoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SeminuevoTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListSeminuevos::route('/'),
            'create' => CreateSeminuevo::route('/create'),
            'edit'   => EditSeminuevo::route('/{record}/edit'),
        ];
    }
}
