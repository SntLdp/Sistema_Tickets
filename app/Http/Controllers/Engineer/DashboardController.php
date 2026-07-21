<?php

namespace App\Http\Controllers\Engineer;

use App\Enums\TicketPriority;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'pendientes' => Ticket::status('pendiente')->count(),
            'en_proceso' => Ticket::status('en_proceso')->count(),
            'finalizados' => Ticket::status('resuelto')->count(),
            'creados_hoy' => Ticket::createdToday()->count(),
            'prioridad_alta' => Ticket::status('pendiente')->orWhere('status', 'en_proceso')
                ->where('priority', 'alta')->count(),
        ];

        $porPrioridad = [
            'alta' => Ticket::priority('alta')->count(),
            'moderada' => Ticket::priority('moderada')->count(),
            'baja' => Ticket::priority('baja')->count(),
        ];

        $resueltosHoy = Ticket::createdToday()->status('resuelto')->count();
        $cerrados = Ticket::status('cerrado')->count();

        // Últimos 7 días para el gráfico de barras
        $ultimaSemana = collect(range(6, 0))->map(function (int $daysAgo) {
            $date = now()->subDays($daysAgo);
            return [
                'fecha' => $date->format('d/m'),
                'total' => Ticket::whereDate('created_at', $date->toDateString())->count(),
            ];
        });

        $actividadReciente = Ticket::with('user', 'category')
            ->latest()
            ->take(8)
            ->get();

        return view('engineer.dashboard', [
            'stats' => $stats,
            'porPrioridad' => $porPrioridad,
            'resueltosHoy' => $resueltosHoy,
            'cerrados' => $cerrados,
            'ultimaSemana' => $ultimaSemana,
            'actividadReciente' => $actividadReciente,
        ]);
    }
}
