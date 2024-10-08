@extends('layout')
@section('title','Products')
@section('content')
    <div class="products">
        <div class="container">
            <div class="row">
                @if(session('success'))
                    <p class="alert alert-success">{{session('success')}}</p>
                @endif
                @foreach($products as $product)
                    <div class="col-6">
                        <div class="card" style="width: 18rem;">
                            <div class="card-img-top ">
                                @foreach($product->images as $image)
                                    <div class="position-relative delete-image">
                                        <img src="{{asset('images/'.$image->name)}}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$product['name']}}</h5>
                                <p class="card-text">{{$product['info']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$product['price']}}</li>
                            </ul>
                            <div class="card-body">
                                <a href="products/{{$product['id']}}/edit" class="card-link">Edit</a>
                              @if(auth()->id() ==$product['user_id'] &&auth()->user()['type']!='admin' )
                                    <a href="orders/add/{{$product['id']}}" class="card-link">add to cart</a>
                              @endif
                            </div>
                        </div>
                    </div>



                @endforeach
            </div>
        </div>
    </div>


@endsection
