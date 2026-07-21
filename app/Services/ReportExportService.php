<?php

namespace App\Services;

use App\Exports\DailyTicketsExport;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportService
{
    public function dailySummary(string $date): array
    {
        $tickets = Ticket::with('user', 'category')
            ->whereDate('created_at', $date)
            ->orderBy('created_at')
            ->get();

        return [
            'date' => $date,
            'tickets' => $tickets,
            'total' => $tickets->count(),
            'alta' => $tickets->where('priority.value', 'alta')->count(),
            'moderada' => $tickets->where('priority.value', 'moderada')->count(),
            'baja' => $tickets->where('priority.value', 'baja')->count(),
            'resueltos' => $tickets->whereIn('status.value', ['resuelto', 'cerrado'])->count(),
            'pendientes' => $tickets->where('status.value', 'pendiente')->count(),
        ];
    }

    public function toPdf(string $date): Response
    {
        $data = $this->dailySummary($date);
        $pdf = Pdf::loadView('exports.daily-pdf', $data);

        return $pdf->download("reporte-diario-{$date}.pdf");
    }

    public function toExcel(string $date)
    {
        return Excel::download(new DailyTicketsExport($date), "reporte-diario-{$date}.xlsx");
    }
}
