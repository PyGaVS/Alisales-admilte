@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Dashboard')}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">{{__('You are logged in!')}}</p>
                </div>
            </div>
            <img class="img" src="img/image.jpg" alt="roller" width=500px />
        </div>
    </div>
@stop
