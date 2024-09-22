<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DatabaseNotification;
use App\Models\comment;
use App\Models\ticket;
class CommentController extends Controller
{
    public function index()
    {

    }
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        Comment::create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        // Notify the ticket owner about the new comment
        Notification::send($ticket->user, new DatabaseNotification([
            'message' => 'A new comment has been added to your ticket: ' . $ticket->title,
            'link' => route('tickets.show', $ticket->id),
        ]));

        return redirect()->back();
    }
}
