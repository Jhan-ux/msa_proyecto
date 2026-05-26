<?php

namespace App\Filament\Resources\ConsultaServicios;

use App\Filament\Resources\ConsultaServicios\Pages\CreateConsultaServicio;
use App\Filament\Resources\ConsultaServicios\Pages\EditConsultaServicio;
use App\Filament\Resources\ConsultaServicios\Pages\ListConsultaServicios;
use App\Filament\Resources\ConsultaServicios\Pages\ViewConsultaServicio;
use App\Filament\Resources\ConsultaServicios\Schemas\ConsultaServicioForm;
use App\Filament\Resources\ConsultaServicios\Schemas\ConsultaServicioInfolist;
use App\Filament\Resources\ConsultaServicios\Tables\ConsultaServiciosTable;
use App\Models\ConsultaServicio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConsultaServicioResource extends Resource
{
    protected static ?string $model = ConsultaServicio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $modelLabel = 'Consulta de Servicio';
    protected static ?string $pluralModelLabel = 'Consultas de Servicios';
    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): string
    {
        return 'Comunicaciones';
    }

    public static function form(Schema $schema): Schema
    {
        return ConsultaServicioForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConsultaServicioInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConsultaServiciosTable::configure($table);
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
            'index' => ListConsultaServicios::route('/'),
            'create' => CreateConsultaServicio::route('/create'),
            'view' => ViewConsultaServicio::route('/{record}'),
            'edit' => EditConsultaServicio::route('/{record}/edit'),
        ];
    }
}
