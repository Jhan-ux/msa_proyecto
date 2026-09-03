<?php

namespace App\Filament\Resources\Locales\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LocalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->placeholder('Sede Cajamarca'),
                TextInput::make('ciudad')
                    ->required()
                    ->placeholder('Cajamarca'),
                TextInput::make('direccion')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('telefono')
                    ->tel()
                    ->placeholder('+51 966 154 210'),
                TextInput::make('whatsapp')
                    ->placeholder('+51 966 154 210')
                    ->helperText('Número sin espacios ni guiones para el enlace wa.me'),
                TextInput::make('email')
                    ->email(),
                TextInput::make('horario')
                    ->placeholder('Lun – Vie: 8:00 am – 6:00 pm | Sáb: 8:00 am – 1:00 pm')
                    ->columnSpanFull(),
                Textarea::make('mapa_embed')
                    ->rows(3)
                    ->columnSpanFull()
                    ->helperText('URL de Google Maps (src del iframe) o código iframe completo'),
                TextInput::make('imagen')
                    ->helperText('URL completa (https://...) o ruta relativa desde public/ (ej: img/locales/cajamarca.jpg)')
                    ->placeholder('https://example.com/img.jpg  ó  img/locales/cajamarca.jpg')
                    ->columnSpanFull(),
                Toggle::make('activo')
                    ->default(true)
                    ->required(),
                TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}
