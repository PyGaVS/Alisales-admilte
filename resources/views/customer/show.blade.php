@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Customer card')}} n°{{$customer->id}}</h1>
@stop
@section('plugins.Datatables', true)
@section('content')
    <div class="row">
        <div class="col-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            </div>
                            <h3 class="profile-username text-center">{{$customer->name}}</h3>
                            <!--<p class="text-muted text-center">Software Engineer</p>-->
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{__('Address')}}</b> <p class="float-right">{{$customer->address}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('Postal code')}}</b> <p class="float-right">{{$customer->postalCode}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('City')}}</b> <p class="float-right">{{$customer->city}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('Mail')}}</b> <p class="float-right">{{$customer->email}}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>{{__('Website')}}</b> <a target="_blank" href="{{$customer->url}}" class="float-right"><i class="fas fa-link"></i></a>
                                </li>
                            </ul>
                            <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                        </div>
                    </div>
            <img class="img" src="img/image.jpg" alt="" width=500px />
        </div>

        <!-- LISTE DES COMMANDES -->
        <div class="col-8">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <nobr><div style="
    display:flex;
    justify-content: space-between;
    margin-bottom: 10px;
    ">
                            <h3 class="profile-username">{{__('Orders')}}</h3>
                            <a type="button" class="btn btn-primary" href="{{route('customer-order.create', $customer->id)}}">
                                <i style="margin-right: 10px;" class="fas fa-plus fa-lg"></i>{{__('Add order')}}</a>
                        </div>
                    </nobr>
                    <x-adminlte-datatable id="table1" :heads="$heads" :config="$config"
                                          striped hoverable beautify>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order['reference']}}</td>
                                <td>{{$order['creationDate']}}</td>
                                <td>{{number_format($order['amountET'] + $order['amountVTA'], 2, ',', ' ')}}€</td>
                                <td><nobr>
                                        <!-- SHOW -->
                                        <a class="btn btn-xs btn-default text-teal mx-1 shadow" href="{{route('order.show', $order['id'])}}">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>

                                        <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="#">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
