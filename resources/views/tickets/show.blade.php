@extends('layout')
@section('title','Show | Ticket')
@section('content')
    <h2>{{ $ticket->title }} ({{ $ticket->type }})</h2>
    <p>{{ $ticket->info }}</p>

    <h3>Comments:</h3>
    <ul>
        @foreach($ticket->comments as $comment)
            <li>{{ $comment->message }} - {{ $comment->user->name }}</li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('comments.store', $ticket->id) }}">
        @csrf
        <textarea name="message" required></textarea>
        <button type="submit">Add Comment</button>
    </form>




@endsection
