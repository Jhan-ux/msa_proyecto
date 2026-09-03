<?php

namespace App\Filament\Resources\PromocionPreguntas;

use App\Filament\Resources\PromocionPreguntas\Pages\CreatePromocionPregunta;
use App\Filament\Resources\PromocionPreguntas\Pages\EditPromocionPregunta;
use App\Filament\Resources\PromocionPreguntas\Pages\ListPromocionPreguntas;
use App\Filament\Resources\PromocionPreguntas\RelationManagers\OpcionesRelationManager;
use App\Filament\Resources\PromocionPreguntas\Schemas\PromocionPreguntaForm;
use App\Filament\Resources\PromocionPreguntas\Tables\PromocionPreguntasTable;
use App\Models\PromocionPregunta;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromocionPreguntaResource extends Resource
{
    protected static ?string $model = PromocionPregunta::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'pregunta';

    protected static ?string $navigationLabel = 'Preguntas';

    protected static ?string $modelLabel = 'Pregunta';

    protected static ?string $pluralModelLabel = 'Preguntas';

    protected static ?int $navigationSort = 2;

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
        return PromocionPreguntaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromocionPreguntasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            OpcionesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromocionPreguntas::route('/'),
            'create' => CreatePromocionPregunta::route('/create'),
            'edit' => EditPromocionPregunta::route('/{record}/edit'),
        ];
    }
}
