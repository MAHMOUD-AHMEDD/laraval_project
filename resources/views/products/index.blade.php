@extends('layout')
@section('title','Products')
@section('content')
    <div class="products">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-6">
                        <div class="card" style="width: 18rem;">
{{--                            <div class="card-img-top images"></div>--}}
                            <div class="card-body">
                                <h5 class="card-title">{{$product['name']}}</h5>
                                <p class="card-text">{{$product['info']}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$product['price']}}</li>
                            </ul>
                            <div class="card-body">
                                <a href="products/{{$product['id']}}/edit" class="card-link">Edit</a>
                            </div>
                        </div>
                    </div>



                @endforeach
            </div>
        </div>
    </div>


@endsection
