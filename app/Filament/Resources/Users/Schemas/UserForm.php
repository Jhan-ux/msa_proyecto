<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->minLength(8)
                    ->helperText('Dejar en blanco para no cambiar la contraseña (solo en edición)')
                    ->maxLength(255),

                TextInput::make('password_confirmation')
                    ->label('Confirmar contraseña')
                    ->password()
                    ->dehydrated(false)
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->same('password')
                    ->helperText('Repite la contraseña'),
            ]);
    }
}
