<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use App\Models\ticket;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DatabaseNotification;
class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('comments')->with('user')->paginate(10); // Adjust as needed
        return view('tickets.admin.index', compact('tickets'));
    }
    public function create()
    {
        return view('tickets.create');
    }
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
//        $admin = User::where('type', 'admin')->first();
        if ($admin) {
            Notification::send($admin, new DatabaseNotification([
                'message' => 'A new ticket has been submitted: ' . $ticket->title,
                'link' => route('tickets.show', $ticket->id),
            ]));
        }

        return redirect()->route('tickets.show', $ticket->id);
    }
    public function show_notifications()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('notifications', compact('notifications'));
    }
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
    public function show_admin(Ticket $ticket)
    {
        $ticket->load('comments'); // Eager load comments
        return view('admin.tickets.show', compact('ticket'));
    }
    public function sendAnswer(Request $request, Ticket $ticket)
    {
        $request->validate(['answer' => 'required|string']);

        $ticket->comments()->create([
            'ticket_id'=>$ticket->id,
            'message' => $request->message,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tickets.admin.show', $ticket)->with('success', 'Answer sent successfully.');
    }


}
