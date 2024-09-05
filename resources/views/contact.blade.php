<<<<<<< HEAD
@extends('layout');
@section('title','contact')
@section('content')
    <div class="contact_us">
        <div class="container">
            <form method="post" action="{{route('contact.save')}}">
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
                </div><div class="mb-3">
                    <label>title</label>
                    <input class="form-control" name="title" value="{{old('title')}}">
                    @error('title')
                    <p class="mt-3 alert alert-danger">{{$message}}</p>
                    @enderror
                </div><div class="mb-3">
                    <label>message</label>
                    <input class="form-control" name="message" value="{{old('text')}}">
                    @error('message')
                    <p class="mt-3 alert alert-danger">{{$message}}</p>
                    @enderror
                </div><div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="send">
                </div>
            </form>
        </div>
    </div>
=======
@extends('layout')
@section('title','Contact Us')
@section('content')
    <div class="contact_us">
        <div class="container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            @if(session('success'))
                <p class="alert alert-success">{{session('success')}}</p>
            @endif
            <form method="post" action="{{route('contact.submit')}}">
                @csrf
                <div class="mb-3">
                    <label>Username</label>
                    <input class="form-control" name="username" value="{{old('username')}}">
                    @error('username')
                    there is error in username
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Title</label>
                    <input class="form-control" name="title" value="{{old('title')}}">
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea class="form-control" name="message">{{old('message')}}</textarea>
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
    </div>

>>>>>>> ccd36d9 (DashBoard)
@endsection
