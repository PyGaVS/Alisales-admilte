@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Customer card')}} n°{{$customer->id}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
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
    </div>
@stop
