<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ticket;
class TicketApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::query()->with('comments.user')->paginate(10);
        return response()->json($tickets);
    }
    public function sendAnswer(Request $request, Ticket $ticket)
    {
        $request->validate(['answer' => 'required|string']);
        $ticket->comments()->create([
            'content' => $request->answer,
            'user_id' => auth()->id(), // Assuming the admin is sending the answer
        ]);
        return response()->json(['success' => 'Answer sent successfully.']);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket)
    {
        $ticket->load('comments.user');
        return response()->json($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
