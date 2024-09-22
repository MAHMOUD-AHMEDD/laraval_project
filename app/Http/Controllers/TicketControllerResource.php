<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TicketFormRequest;
use App\Models\ticket;
use App\Models\User;
use App\Notifications\DatabaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TicketControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketFormRequest $request)
    {
        $data=$request->validated();
//        $ticket=ticket::query()->updateOrCreate(['id'=>$data->id],$data);
        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'type' => $request->type,
            'info' => $request->info,
        ]);
        $admin = User::query()->where('type', 'admin')->first();
        $admin = User::where('type', 'admin')->first();
        Notification::send($admin, new DatabaseNotification([
            'message' => 'A new ticket has been submitted: ' . $ticket->title,
            'link' => route('tickets.show', $ticket->id),
        ]));

        return redirect()->route('tickets.show', $ticket->id);
    }
    /**
     * Display the specified resource.
     */
        public function show(Ticket $ticket)
    {
        $ticket->load('comments');
        return view('tickets.show', compact('ticket'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
