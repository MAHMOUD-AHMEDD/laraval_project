@extends('layout');
@section('title','notifications');
@section('content')
    <ul>
        @foreach($notifications as $notification)
            <li>
                <a href="{{ $notification->data['link'] }}">
                    {{ $notification->data['message'] }}
                </a>
                <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                    @csrf
                    <button type="submit">Mark as Read</button>
                </form>
            </li>
        @endforeach
    </ul>







@endsection
