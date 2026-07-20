<?php

namespace App\Filament\Resources\PromocionParticipantes\Pages;

use App\Filament\Resources\PromocionParticipantes\PromocionParticipanteResource;
use App\Models\PromocionParticipante;
use Dompdf\Dompdf;
use Dompdf\Options;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromocionParticipantes extends ListRecords
{
    protected static string $resource = PromocionParticipanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('descargar_pdf')
                ->label('Descargar PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('gray')
                ->action('downloadParticipantsPdf'),
        ];
    }

    public function downloadParticipantsPdf()
    {
        $participantes = PromocionParticipante::query()
            ->with('evento:id,nombre')
            ->orderByDesc('created_at')
            ->get();

        $html = view('pdf.promocion_participantes', [
            'participantes' => $participantes,
            'generadoEn' => now(),
        ])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'helvetica');
        $options->set('isFontSubsettingEnabled', false);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->render();

        $filename = 'participantes_promociones_' . now()->format('Ymd_His') . '.pdf';

        return response()->streamDownload(function () use ($dompdf) {
            echo $dompdf->output();
        }, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
