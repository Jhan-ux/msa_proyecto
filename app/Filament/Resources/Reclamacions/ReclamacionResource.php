<?php

namespace App\Filament\Resources\Reclamacions;

use App\Filament\Resources\Reclamacions\Pages\CreateReclamacion;
use App\Filament\Resources\Reclamacions\Pages\EditReclamacion;
use App\Filament\Resources\Reclamacions\Pages\ListReclamacions;
use App\Filament\Resources\Reclamacions\Schemas\ReclamacionForm;
use App\Filament\Resources\Reclamacions\Tables\ReclamacionsTable;
use App\Models\Reclamacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReclamacionResource extends Resource
{
    protected static ?string $model = Reclamacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'nro_reclamo';

    protected static ?string $navigationLabel = 'Reclamaciones';

    protected static ?string $modelLabel = 'Reclamación';

    protected static ?string $pluralModelLabel = 'Reclamaciones';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): string
    {
        return 'Comunicaciones';
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return ReclamacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReclamacionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReclamacions::route('/'),
            'create' => CreateReclamacion::route('/create'),
            'edit' => EditReclamacion::route('/{record}/edit'),
        ];
    }
}
