@extends('layout')
@section('title','reply|Tickets')
@section('content')
    <h1>Ticket Details</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h3>Title: {{ $ticket->title }}</h3>
    <p>type: {{ $ticket->type }}</p>
    <p>info: {{ $ticket->info }}</p>

    <h4>Comments:</h4>
    <ul>
        @foreach($ticket->comments as $comment)
            <li>{{ $comment->message }} - <em>{{ $comment->user->name }}</em></li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('admin.tickets.sendAnswer', $ticket) }}">
        @csrf
        <textarea name="answer" placeholder="Your answer here..." required></textarea>
        <button type="submit">Send Answer</button>
    </form>

    <a href="{{ route('admin.tickets.index') }}">Back to Tickets</a>
@endsection
