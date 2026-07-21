<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function __construct(private readonly TicketService $ticketService) {}

    /** Formulario para registrar un nuevo ticket. */
    public function create(): View
    {
        $this->authorize('create', Ticket::class);

        return view('user.create-ticket');
    }

    public function store(StoreTicketRequest $request): RedirectResponse
    {
        $this->ticketService->createTicket($request->user(), $request->validated());

        return redirect()
            ->route('user.tickets.index')
            ->with('success', 'Tu ticket fue enviado correctamente. Te notificaremos sobre su avance.');
    }

    /** Listado únicamente de los tickets del usuario autenticado. */
    public function index(Request $request): View
    {
        $tickets = Ticket::with('category')
            ->forUser($request->user()->id)
            ->status($request->query('status'))
            ->priority($request->query('priority'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('user.my-tickets', compact('tickets'));
    }

    public function show(Ticket $ticket): View
    {
        $this->authorize('view', $ticket);

        $ticket->load('category', 'engineer');

        return view('user.ticket-detail', compact('ticket'));
    }
}
