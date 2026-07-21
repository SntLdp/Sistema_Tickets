<?php

namespace App\Services;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Models\TicketStatusHistory;
use App\Models\User;

class TicketService
{
    public function createTicket(User $user, array $data): Ticket
    {
        return Ticket::create([
            'user_id' => $user->id,
            'department' => $data['department'] ?? $user->department,
            'description' => $data['description'],
            'priority' => $data['priority'],
            'status' => TicketStatus::Pendiente->value,
        ]);
    }

    /**
     * Cambia el estado del ticket validando que la transición sea válida
     * y registrando el movimiento en el historial.
     */
    public function changeStatus(Ticket $ticket, TicketStatus $newStatus, User $engineer): Ticket
    {
        $currentStatus = $ticket->status;

        abort_unless(
            in_array($newStatus, $currentStatus->allowedTransitions(), true),
            422,
            "No se puede cambiar de \"{$currentStatus->label()}\" a \"{$newStatus->label()}\"."
        );

        TicketStatusHistory::create([
            'ticket_id' => $ticket->id,
            'from_status' => $currentStatus->value,
            'to_status' => $newStatus->value,
            'changed_by' => $engineer->id,
        ]);

        $ticket->update([
            'status' => $newStatus->value,
            'assigned_to' => $ticket->assigned_to ?? $engineer->id,
        ]);

        return $ticket->fresh();
    }

    public function classify(Ticket $ticket, int $categoryId): Ticket
    {
        $ticket->update(['category_id' => $categoryId]);

        return $ticket->fresh();
    }
}
