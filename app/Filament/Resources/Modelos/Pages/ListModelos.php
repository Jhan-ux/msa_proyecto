<?php

namespace App\Filament\Resources\Modelos\Pages;

use App\Filament\Resources\Modelos\ModeloResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use App\Models\Modelo;

class ListModelos extends ListRecords
{
    protected static string $resource = ModeloResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('importar_csv')
                ->label('Importar CSV')
                ->form([
                    FileUpload::make('archivo')
                        ->label('Archivo CSV')
                        ->disk('public')
                        ->directory('csv_imports')
                        ->acceptedFileTypes(['text/csv'])
                        ->required(),
                ])
                ->action(function (array $data) {
                    $path = $data['archivo'];
                    $fullPath = Storage::disk('public')->path($path);
                    $csv = Reader::createFromPath($fullPath, 'r');
                    $csv->setHeaderOffset(0);

                    foreach ($csv as $row) {
                        Modelo::updateOrCreate(
                            ['slug' => $row['Slug']],
                            [
                                'marca_id' => 1, // Ajusta según corresponda
                                'nombre' => $row['Nombre'],
                                'slug' => $row['Slug'],
                                'precio' => $row['Precio (Soles)'],
                                'precio_dolares' => $row['Precio (Dólares)'],
                                'tipo' => $row['Tipo/Categoría'],
                                'activo' => $row['Activo'] === 'Sí',
                                'destacado' => $row['Destacado en Home'] === 'Sí',
                                // ...otros campos si los tienes
                            ]
                        );
                    }
                    $this->notify('success', 'Modelos importados correctamente');
                }),
        ];
    }
}
