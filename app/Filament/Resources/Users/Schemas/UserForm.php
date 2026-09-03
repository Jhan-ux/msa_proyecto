<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre completo')
                    ->prefixIcon(Heroicon::OutlinedUser)
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->prefixIcon(Heroicon::OutlinedEnvelope)
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Select::make('role')
                    ->label('Rol en el sistema')
                    ->prefixIcon(Heroicon::OutlinedShieldCheck)
                    ->options([
                        'admin'    => 'Administrador (Acceso Total)',
                        'vendedor' => 'Vendedor / Asesor Comercial',
                    ])
                    ->default('vendedor')
                    ->required()
                    ->reactive(),

                Select::make('categoria_vendedor')
                    ->label('Especialidad / Categoría de Ventas')
                    ->prefixIcon(Heroicon::OutlinedTruck)
                    ->options([
                        'autos'    => 'Autos & SUVs',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones & Comerciales',
                        'todos'    => 'Todas las Categorías (General)',
                    ])
                    ->default('autos')
                    ->required()
                    ->helperText('Define qué cotizaciones verá este vendedor al iniciar sesión.'),

                TextInput::make('telefono')
                    ->label('Teléfono / WhatsApp')
                    ->prefixIcon(Heroicon::OutlinedPhone)
                    ->tel()
                    ->maxLength(30)
                    ->placeholder('Ej: 966154210'),

                Toggle::make('activo')
                    ->label('Usuario Activo')
                    ->default(true)
                    ->helperText('Desactiva para suspender el acceso a este usuario sin eliminarlo.'),

                TextInput::make('password')
                    ->label('Contraseña')
                    ->prefixIcon(Heroicon::OutlinedKey)
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->minLength(8)
                    ->helperText('Dejar en blanco para no cambiar la contraseña (solo en edición)')
                    ->maxLength(255),

                TextInput::make('password_confirmation')
                    ->label('Confirmar contraseña')
                    ->prefixIcon(Heroicon::OutlinedKey)
                    ->password()
                    ->dehydrated(false)
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->same('password')
                    ->helperText('Repite la contraseña'),
            ]);
    }
}
