@extends('admin.admin_layout')
@section('title','Admin | Users')
@section('content')
<h1>User Management</h1>

<form method="GET" action="{{ route('admin.users.index') }}">
    <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Control</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('admin.users.sendNotification', $user) }}" method="POST" >
                    @csrf
                    <input type="text" name="message" placeholder="Notification message" required>
                    <button type="submit">Send Notification</button>
                </form>
                <a href="/delete-item?model_name=users&id={{$user->id}}"><i class="ri-close-line"></i> </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $users->links() }} <!-- Pagination links -->

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@endsection
