@extends('layout');
@section('title','contact')
@section('content')
    <div class="contact_us">
        <div class="container">
            <form method="post" action="{{route('users.reg')}}">
                @csrf
                @if(session('success'))
                    <p class="alert alert-success">{{session('success')}}</p>
                @endif
                <div class="mb-3">
                    <label>username</label>
                    <input class="form-control" name="username" value="{{old('username')}}">
                    @error('username')
                    <p class="mt-3 alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>email</label>
                    <input class="form-control" name="email" value="{{old('email')}}">
                    @error('email')
                    <p class="mt-3 alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>password</label>
                    <input class="form-control" name="password" type="password" value="{{old('password')}}">
                    @error('password')
                    <p class="mt-3 alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="send">
                </div>
            </form>
        </div>
    </div>
@endsection
