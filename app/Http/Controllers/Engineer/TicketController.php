<?php

namespace App\Http\Controllers\Engineer;

use App\Enums\TicketStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateTicketStatusRequest;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use App\Services\TicketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function __construct(private readonly TicketService $ticketService) {}

    /** Tabla principal con todas las solicitudes + filtros y búsqueda. */
    public function index(Request $request): View
    {
        $tickets = Ticket::with('user', 'category', 'engineer')
            ->status($request->query('status'))
            ->priority($request->query('priority'))
            ->category($request->query('category_id'))
            ->when($request->query('user'), fn ($q, $term) =>
                $q->whereHas('user', fn ($u) => $u->where('name', 'like', "%{$term}%"))
            )
            ->when($request->query('date'), fn ($q, $date) =>
                $q->whereDate('created_at', $date)
            )
            ->when($request->query('q'), fn ($q, $term) =>
                $q->where('description', 'like', "%{$term}%")
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $categories = TicketCategory::where('is_active', true)->orderBy('name')->get();

        return view('engineer.tickets.index', compact('tickets', 'categories'));
    }

    public function show(Ticket $ticket): View
    {
        $ticket->load('user', 'category', 'engineer', 'comments.user', 'statusHistory.changedBy');
        $categories = TicketCategory::where('is_active', true)->orderBy('name')->get();

        return view('engineer.tickets.show', compact('ticket', 'categories'));
    }

    public function updateStatus(UpdateTicketStatusRequest $request, Ticket $ticket): RedirectResponse
    {
        $this->authorize('manage', $ticket);

        $this->ticketService->changeStatus(
            $ticket,
            TicketStatus::from($request->validated('status')),
            $request->user()
        );

        return back()->with('success', 'Estado del ticket actualizado correctamente.');
    }

    public function classify(Request $request, Ticket $ticket): RedirectResponse
    {
        $this->authorize('manage', $ticket);

        $request->validate(['category_id' => ['required', 'exists:ticket_categories,id']]);

        $this->ticketService->classify($ticket, (int) $request->input('category_id'));

        return back()->with('success', 'Ticket clasificado correctamente.');
    }
}
