@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Order')}} : {{$order->reference}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            </div>
                            <h3 class="profile-username text-center">{{$order->customer->name}}</h3>
                            <!--<p class="text-muted text-center">Software Engineer</p>-->
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{__('Date')}}</b> <p class="float-right">{{$order->creationDate}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('Amount')}}</b> <p class="float-right">{{number_format($order->amountET, 2, ',', ' ')}}€</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('VTA')}}</b> <p class="float-right">{{number_format($order->amountVTA, 2, ',', ' ')}}€</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('Total')}}</b> <p class="float-right">{{number_format($order['amountET'] + $order['amountVTA'], 2, ',', ' ')}}€</p>
                                </li>
                            </ul>
                            <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                        </div>
                    </div>
            <img class="img" src="img/image.jpg" alt="" width=500px />
        </div>
    </div>
@stop
