<?php

namespace App\Filament\Resources\Locales;

use App\Filament\Resources\Locales\Pages\CreateLocal;
use App\Filament\Resources\Locales\Pages\EditLocal;
use App\Filament\Resources\Locales\Pages\ListLocales;
use App\Filament\Resources\Locales\Schemas\LocalForm;
use App\Filament\Resources\Locales\Tables\LocalesTable;
use App\Models\Local;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LocalResource extends Resource
{
    protected static ?string $model = Local::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Locales';

    protected static ?string $modelLabel = 'Local';

    protected static ?string $pluralModelLabel = 'Locales';

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
        return LocalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LocalesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListLocales::route('/'),
            'create' => CreateLocal::route('/create'),
            'edit'   => EditLocal::route('/{record}/edit'),
        ];
    }
}
