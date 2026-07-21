<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DailyTicketsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function __construct(private readonly string $date) {}

    public function collection(): Collection
    {
        return Ticket::with('user', 'category')
            ->whereDate('created_at', $this->date)
            ->orderBy('created_at')
            ->get();
    }

    public function headings(): array
    {
        return ['Fecha', 'Hora', 'Usuario', 'Departamento', 'Descripción', 'Prioridad', 'Clasificación', 'Estado'];
    }

    public function map($ticket): array
    {
        return [
            $ticket->created_at->format('d/m/Y'),
            $ticket->created_at->format('H:i'),
            $ticket->user->name,
            $ticket->department ?? '—',
            $ticket->description,
            $ticket->priority->label(),
            $ticket->category?->name ?? 'Sin clasificar',
            $ticket->status->label(),
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [1 => ['font' => ['bold' => true]]];
    }
}
