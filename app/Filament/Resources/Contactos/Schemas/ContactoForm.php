<?php

namespace App\Filament\Resources\Contactos\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ContactoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre del Cliente')
                    ->prefixIcon(Heroicon::OutlinedUser)
                    ->required()
                    ->maxLength(120),

                TextInput::make('telefono')
                    ->label('Teléfono / Celular')
                    ->prefixIcon(Heroicon::OutlinedPhone)
                    ->tel()
                    ->required()
                    ->maxLength(30)
                    ->helperText('Número para contacto telefónico y WhatsApp.'),

                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->prefixIcon(Heroicon::OutlinedEnvelope)
                    ->email()
                    ->maxLength(120),

                Select::make('categoria_vehiculo')
                    ->label('Categoría de Cotización')
                    ->prefixIcon(Heroicon::OutlinedTruck)
                    ->options([
                        'autos'    => 'Autos & SUVs',
                        'motos'    => 'Motos',
                        'camiones' => 'Camiones & Comerciales',
                        'general'  => 'Consulta General',
                    ])
                    ->default('autos')
                    ->required(),

                TextInput::make('marca')
                    ->label('Marca / Modelo de Interés')
                    ->prefixIcon(Heroicon::OutlinedTag)
                    ->placeholder('Ej: Chevrolet Tracker, Honda CB190, Isuzu NPR')
                    ->maxLength(80),

                Select::make('vendedor_id')
                    ->label('Vendedor Asignado')
                    ->prefixIcon(Heroicon::OutlinedBriefcase)
                    ->options(User::where('activo', true)->pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('Sin asignar (visible para toda la categoría)')
                    ->helperText('Asigna esta cotización a un asesor comercial específico.'),

                Select::make('estado')
                    ->label('Estado Comercial del Lead')
                    ->prefixIcon(Heroicon::OutlinedArrowPath)
                    ->options([
                        'nuevo'          => 'Nuevo (Sin Atender)',
                        'en_seguimiento' => 'En Seguimiento (Contactado)',
                        'cotizado'       => 'Cotización Formal Enviada',
                        'ganado'         => 'Venta Concretada (Ganado)',
                        'no_interesado'  => 'No Interesado / Descartado',
                    ])
                    ->default('nuevo')
                    ->required(),

                TextInput::make('asunto')
                    ->label('Asunto')
                    ->prefixIcon(Heroicon::OutlinedChatBubbleBottomCenterText)
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('mensaje')
                    ->label('Mensaje / Solicitud del Cliente')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('notas_vendedor')
                    ->label('Bitácora / Notas del Vendedor')
                    ->placeholder('Escribe aquí el resumen de las llamadas, fecha de visita, acuerdos de precio o financiamiento...')
                    ->rows(4)
                    ->columnSpanFull()
                    ->helperText('Espacio exclusivo para que el vendedor registre el avance de la negociación.'),
            ]);
    }
}
