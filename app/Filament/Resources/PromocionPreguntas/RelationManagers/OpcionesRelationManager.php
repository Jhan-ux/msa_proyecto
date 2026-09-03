<?php

namespace App\Filament\Resources\PromocionPreguntas\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OpcionesRelationManager extends RelationManager
{
    protected static string $relationship = 'opciones';

    protected static ?string $title = 'Opciones de respuesta';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('texto')
                ->required(),
            TextInput::make('orden')
                ->numeric()
                ->default(0)
                ->required(),
            Toggle::make('es_correcta')
                ->label('Es correcta')
                ->default(false),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('texto')
                    ->searchable(),
                IconColumn::make('es_correcta')
                    ->boolean(),
                TextColumn::make('orden')
                    ->sortable(),
            ])
            ->defaultSort('orden')
            ->headerActions([
                CreateAction::make()->label('Nueva opcion'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
