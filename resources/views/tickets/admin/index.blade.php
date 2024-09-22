@extends('layout')
@section('title','show|Tickets')
@section('content')
    <h1>Ticket of users</h1>

    <table>
        <thead>
        <tr>
            <th>username</th>
            <th>Title</th>
            <th>type</th>
            <th>info</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td>{{$ticket->user->name}}</td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->type }}</td>
                <td>{{ $ticket->info }}</td>
                <td>
                    <a href="{{ route('tickets.admin.show', $ticket) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $tickets->links() }}
@endsection
