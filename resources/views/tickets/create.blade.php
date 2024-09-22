@extends('layout')
@section('title','Create | Ticket')
@section('content')
    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="type">Type:</label>
        <select name="type">
            <option value="request">Request</option>
            <option value="problem">Problem</option>
        </select>

        <label for="info">Details:</label>
        <textarea name="info" required></textarea>

        <button type="submit">Submit Ticket</button>
    </form>




@endsection
