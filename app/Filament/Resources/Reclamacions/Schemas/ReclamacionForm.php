<?php

namespace App\Filament\Resources\Reclamacions\Schemas;

use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReclamacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Datos del cliente ──────────────────────────────────
                Fieldset::make('Datos del cliente')
                    ->schema([
                        Select::make('tipo_persona')
                            ->options(['natural' => 'Persona natural', 'juridica' => 'Persona jurídica'])
                            ->default('natural')
                            ->required(),
                        Select::make('tipo_documento')
                            ->options(['DNI' => 'DNI', 'CE' => 'CE', 'Pasaporte' => 'Pasaporte', 'RUC' => 'RUC'])
                            ->default('DNI')
                            ->required(),
                        TextInput::make('nro_documento')
                            ->required(),
                        TextInput::make('nombre')
                            ->required(),
                        TextInput::make('ap_paterno')
                            ->required(),
                        TextInput::make('ap_materno'),
                        TextInput::make('placa'),
                    ])
                    ->columns(2),

                // ── Tipo de respuesta ──────────────────────────────────
                Fieldset::make('Tipo de respuesta')
                    ->schema([
                        Select::make('tipo_respuesta')
                            ->options(['domicilio' => 'Dirección Domiciliaria', 'email' => 'Correo Electrónico'])
                            ->default('domicilio'),
                        TextInput::make('direccion'),
                        TextInput::make('departamento'),
                        TextInput::make('provincia'),
                        TextInput::make('distrito'),
                        TextInput::make('telefono')
                            ->tel(),
                        TextInput::make('email')
                            ->email()
                            ->required(),
                    ])
                    ->columns(2),

                // ── Información general ────────────────────────────────
                Fieldset::make('Información general')
                    ->schema([
                        Select::make('tienda')
                            ->options(['cajamarca' => 'Cajamarca', 'banos_inca' => 'Baños del Inca', 'lima' => 'Lima', 'piura' => 'Piura']),
                        Select::make('area')
                            ->options(['ventas' => 'Ventas', 'servicio' => 'Servicio / Taller', 'repuestos' => 'Repuestos', 'administracion' => 'Administración', 'creditos' => 'Créditos']),
                        Select::make('tipo_bien')
                            ->options(['Producto' => 'Producto', 'Servicio' => 'Servicio']),
                        TextInput::make('monto')
                            ->numeric()
                            ->prefix('S/'),
                        Textarea::make('descripcion')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                // ── Detalles del reclamo ───────────────────────────────
                Fieldset::make('Detalles del reclamo')
                    ->schema([
                        Select::make('tipo_reclamo')
                            ->options(['reclamo' => 'Reclamo', 'queja' => 'Queja'])
                            ->default('reclamo')
                            ->required(),
                        Textarea::make('detalle_reclamo')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('pedido')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                // ── Datos del apoderado ────────────────────────────────
                Fieldset::make('Datos del Apoderado')
                    ->schema([
                        Toggle::make('menor_de_edad')
                            ->columnSpanFull(),
                        Select::make('apoderado_tipo_documento')
                            ->options(['DNI' => 'DNI', 'CE' => 'CE', 'Pasaporte' => 'Pasaporte']),
                        TextInput::make('apoderado_nro_documento'),
                        TextInput::make('apoderado_nombre'),
                        TextInput::make('apoderado_ap_paterno'),
                        TextInput::make('apoderado_ap_materno'),
                        TextInput::make('apoderado_telefono')
                            ->tel(),
                        TextInput::make('apoderado_email')
                            ->email(),
                    ])
                    ->columns(2),

                // ── Estado / control ───────────────────────────────────
                TextInput::make('nro_reclamo')
                    ->disabled()
                    ->dehydrated(false),
                Select::make('estado')
                    ->options(['pendiente' => 'Pendiente', 'en_proceso' => 'En proceso', 'resuelto' => 'Resuelto'])
                    ->default('pendiente')
                    ->required(),
            ]);
    }
}
