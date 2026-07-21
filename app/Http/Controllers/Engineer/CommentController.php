<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Ticket $ticket): RedirectResponse
    {
        $this->authorize('manage', $ticket);

        $ticket->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->validated('body'),
            'is_internal' => $request->boolean('is_internal', true),
        ]);

        return back()->with('success', 'Comentario agregado.');
    }
}
