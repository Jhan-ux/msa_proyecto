<?php

namespace App\Filament\Resources\PromocionParticipantes;

use App\Filament\Resources\PromocionParticipantes\Pages\CreatePromocionParticipante;
use App\Filament\Resources\PromocionParticipantes\Pages\EditPromocionParticipante;
use App\Filament\Resources\PromocionParticipantes\Pages\ListPromocionParticipantes;
use App\Filament\Resources\PromocionParticipantes\Schemas\PromocionParticipanteForm;
use App\Filament\Resources\PromocionParticipantes\Tables\PromocionParticipantesTable;
use App\Models\PromocionParticipante;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromocionParticipanteResource extends Resource
{
    protected static ?string $model = PromocionParticipante::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Participantes';

    protected static ?string $modelLabel = 'Participante';

    protected static ?string $pluralModelLabel = 'Participantes';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): string
    {
        return 'Promociones';
    }

    public static function form(Schema $schema): Schema
    {
        return PromocionParticipanteForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromocionParticipantesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPromocionParticipantes::route('/'),
            'create' => CreatePromocionParticipante::route('/create'),
            'edit' => EditPromocionParticipante::route('/{record}/edit'),
        ];
    }
}
