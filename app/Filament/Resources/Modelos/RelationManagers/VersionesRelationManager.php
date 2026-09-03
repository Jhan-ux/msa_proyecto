<?php

namespace App\Filament\Resources\Modelos\RelationManagers;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VersionesRelationManager extends RelationManager
{
    protected static string $relationship = 'versiones';

    protected static ?string $title = 'Versiones';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nombre')
                ->label('Nombre de la versión')
                ->placeholder('ej: 1.5 MT, 1.5 AT Turbo Premier')
                ->required(),
            Textarea::make('descripcion')
                ->label('Descripción')
                ->rows(3)
                ->default(null)
                ->columnSpanFull(),
            TextInput::make('imagen')
                ->label('Imagen')
                ->helperText('URL completa (https://...) o ruta relativa desde public/')
                ->default(null)
                ->columnSpanFull(),
            TextInput::make('precio')
                ->label('Precio (Soles)')
                ->numeric()
                ->prefix('S/')
                ->default(null),
            TextInput::make('precio_dolares')
                ->label('Precio (Dólares)')
                ->numeric()
                ->prefix('$')
                ->default(null),
            TextInput::make('orden')
                ->label('Orden')
                ->numeric()
                ->default(0),
            Toggle::make('activo')
                ->label('Activo')
                ->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->label('Versión')
                    ->searchable(),
                TextColumn::make('precio')
                    ->label('Precio S/')
                    ->sortable(),
                TextColumn::make('precio_dolares')
                    ->label('Precio $')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('orden')
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()->label('Nueva versión'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
