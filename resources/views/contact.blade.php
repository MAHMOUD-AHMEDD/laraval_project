@extends('layout');
@section('title','contact')
@section('content')
    <div class="contact_us">
        <div class="container">
            <form method="post" action="{{route('contact.submit')}}">
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
@endsection
