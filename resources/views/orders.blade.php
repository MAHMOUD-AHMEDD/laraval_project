@extends('layout')
@section('title','cart')
@section('content')


    <?php $total=0 ?>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                        <div class="card-body p-5">

                            <p class="lead fw-bold mb-5" style="color: #f37a27;">Purchase Reciept</p>



                            <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                                <div class="row">
                                    @foreach($orders as $order)
                                    <div class="col-md-8 col-lg-9">
                                        <p>{{$order->name}}</p>
                                    </div>
                                    <div class="col-md-4 col-lg-3">
                                        <?php $total+=$order->price ?>
                                        <p>{{$order->price}}</p>
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="row my-4">
                                <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                                    <p class="lead fw-bold mb-0" style="color: #f37a27;"><?php echo $total ?></p>
                                </div>
                            </div>



                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
