<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;

class TicketPolicy
{
    /** El usuario solo puede ver su propio ticket; el ingeniero ve todos. */
    public function view(User $user, Ticket $ticket): bool
    {
        return $user->isEngineer() || $ticket->user_id === $user->id;
    }

    /** Cualquier usuario autenticado con rol Usuario puede crear tickets. */
    public function create(User $user): bool
    {
        return $user->isUser();
    }

    /**
     * El usuario dueño solo puede "editar" (consultar estado) si no está cerrado.
     * El ingeniero siempre puede gestionar el ticket.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        if ($user->isEngineer()) {
            return true;
        }

        return $ticket->user_id === $user->id && ! $ticket->status->isLocked();
    }

    /** Solo el ingeniero puede cambiar estado, clasificar y comentar internamente. */
    public function manage(User $user, Ticket $ticket): bool
    {
        return $user->isEngineer();
    }
}
